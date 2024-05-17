<div>Teachable Machine Image Model</div>
<button type="button" onclick="init()">Start</button>
<div id="webcam-container"></div>
<div id="label-container"></div>
<script src="{{ url('/resources/assets/model/tf.min.js') }}"></script>
<script src="{{ url('/resources/assets/model/teachablemachine-image.min.js') }}"></script>
<script type="text/javascript">

    let model, webcam, labelContainer, maxPredictions;

    // Load the image model and setup the webcam
    async function init() {
        const modelURL = "./resources/assets/model/model.json";
        const metadataURL = "./resources/assets/model/metadata.json";

        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        const flip = true; // whether to flip the webcam
        webcam = new tmImage.Webcam(400, 400, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
    }

    // run the webcam image through the image model
    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        for (let i = 0; i < maxPredictions; i++) {
            const classPrediction =
                prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            labelContainer.childNodes[i].innerHTML = classPrediction;
        }

        // Convert the webcam image to a binary image
        const binaryImage = webcam.canvas.cloneNode();
        const ctx = binaryImage.getContext("2d");
        ctx.drawImage(webcam.canvas, 0, 0, webcam.canvas.width, webcam.canvas.height);
        const imageData = ctx.getImageData(0, 0, webcam.canvas.width, webcam.canvas.height);
        for (let i = 0; i < imageData.data.length; i += 4) {
            // Convert to grayscale
            const grayscale = (imageData.data[i] + imageData.data[i + 1] + imageData.data[i + 2]) / 3;
            // Convert to binary
            const binaryValue = grayscale > 128 ? 255 : 0;
            imageData.data[i] = imageData.data[i + 1] = imageData.data[i + 2] = binaryValue;
        }
        ctx.putImageData(imageData, 0, 0);

        // Get the grayscale representation of the green channel
        const greenGrayscaleImage = webcam.canvas.cloneNode();
        const greenGrayscaleCtx = greenGrayscaleImage.getContext("2d");
        greenGrayscaleCtx.drawImage(webcam.canvas, 0, 0, webcam.canvas.width, webcam.canvas.height);
        const greenImageData = greenGrayscaleCtx.getImageData(0, 0, webcam.canvas.width, webcam.canvas.height);
        for (let i = 0; i < greenImageData.data.length; i += 4) {
            greenImageData.data[i] = greenImageData.data[i + 1]; // Green channel
            greenImageData.data[i + 2] = greenImageData.data[i + 1]; // Make it grayscale
            greenImageData.data[i + 3] = 255; // Alpha
        }
        greenGrayscaleCtx.putImageData(greenImageData, 0, 0);

        // Multiply the binary image with the green channel grayscale
        const multipliedImage = webcam.canvas.cloneNode();
        const multipliedCtx = multipliedImage.getContext("2d");
        multipliedCtx.drawImage(binaryImage, 0, 0, webcam.canvas.width, webcam.canvas.height);
        multipliedCtx.globalCompositeOperation = "multiply";
        multipliedCtx.drawImage(greenGrayscaleImage, 0, 0, webcam.canvas.width, webcam.canvas.height);
        
        // Display the multiplied image
        document.getElementById("webcam-container").innerHTML = "";
        document.getElementById("webcam-container").appendChild(multipliedImage);
    }
</script>
