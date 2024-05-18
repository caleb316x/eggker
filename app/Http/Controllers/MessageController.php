<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Egg;

class MessageController extends Controller
{
    public function receiveMessage(Request $request)
    {
        $message = $request->input('message');
        event(new MessageSent($message));
        // dd($message);

        $messages = [
            "peewee",
            "pullet",
            "small",
            "medium",
            "large",
            "extra_large",
            "jumbo",
        ];

        if (in_array($message, $messages)) {
            $egg = Egg::whereDate('sorting_date', now()->toDateString())->first();

            if ($egg) {
                // Row exists, so you can increment the desired column
                $egg->increment($message.'_count');
            } else {
                // Row doesn't exist, you can handle this case accordingly

                $data = [
                    'peewee_count' => 0,
                    'pullet_count' => 0,
                    'small_count' => 0,
                    'medium_count' => 0,
                    'large_count' => 0,
                    'extra_large_count' => 0,
                    'jumbo_count' => 0,
                    'crack_count' => 0,
                ];
            
                // Set sorting_date to current date
                $data['sorting_date'] = now();
                $data[$message.'_count'] += 1;
            
                // Create a new Egg instance with the validated data
                $egg = new Egg();
                $egg->fill($data);
                $egg->save();
            }
            
            // \Log::info('Event dispatched: ', ['message' => $message]);
            return response()->json(['status' => 'Message received', 'message' => $egg]);
        }

        return response()->json(['status' => 'Message received!!', 'message' => $message]);
    }
}
