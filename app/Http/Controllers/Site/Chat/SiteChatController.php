<?php

namespace App\Http\Controllers\Site\Chat;

use App\Events\Site\Chat\MessageSitePosted;
use App\Http\Controllers\Controller;
use App\Models\Site\Chat\SiteChat;
use App\Models\Site\Chat\SiteMessage;
use App\Models\Site\Visitor;
use Illuminate\Http\Request;

class SiteChatController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();
        $visitor = $data['visitor'];

        $messages = SiteMessage::with(['visitor','user'])
            ->where('visitor_id',$visitor['id'])
            ->orderBy('created_at','desc')
            ->get();

        return response()
            ->json([
                'messages'=> $messages,
                'start'=>true
            ]);
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $visitor = Visitor::where('email',$data['email'])->get();
        //dd($visitor);
        if(sizeof($visitor)){
            return response()->json([
                'start'=>true,
                'visitor'=>$visitor,
                'messages'=>SiteMessage::with(['visitor','user'])->where('visitor_id',$visitor->id)->orderBy('created_at','desc')
            ]);
        }else{
            $visitor = Visitor::create($data);
            return response()->json([
                'start'=>true,
                'visitor'=>$visitor,
                'messages'=>''
            ]);

        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $message = SiteMessage::create($data)->get();
        $visitor = Visitor::find($data['visitor_id']);
        broadcast(new MessageSitePosted($message, $visitor))->toOthers();
        //dd($message);
        return response()->json([
            'save'=>true


        ],201);
    }

    public function destroy($id)
    {

    }
}
