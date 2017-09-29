<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    public function index()
    {
        $messages = [];
        $errors   = [];
        try {
            $messages = Message::get();
        } catch (Exception $e) {
            $errors[] = $e->getMessages();
        }
        return view('message.index', [
            'messages' => $messages,
            'errors'   => $errors,
        ]);
    }

    /**
     * @param int $id Must contain the id for the message.
     */
    public function view($id)
    {
        $errors  = [];
        $message = null;
        try {
            $message = Message::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $errors[] = $e->getMessage();
        }

        return view('message.view', [
            'message' => $message,
            'errors'  => $errors,
        ]);
    }

    public function create()
    {
        $dummyData = [
            'title'      => 'Hello, World!!',
            'body'       => 'Lorem ipsum dolor sit amet.',
            'created_by' => 'Richard Atterfalk',
        ];

        $message = new Message;
        $message->fill($dummyData);
        $message->save();

        $url = '/';
        if (isset($message->id)) {
            $url = sprintf('/message/%d', $message->id);
        }

        return redirect($url);
    }
}
