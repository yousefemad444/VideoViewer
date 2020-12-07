<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\MessagesRequest;
use App\Mail\ReplayContactMail;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replay(MessagesRequest $request,Message $message){
      Mail::send(new ReplayContactMail($message,$request->message));
        alert()->success('Mail Sent Successfully','Done');
      return redirect()->route('messages.edit',$message->id);
    }
}
