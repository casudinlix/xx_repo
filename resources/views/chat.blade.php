@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <example-component></example-component>
                    <chat-component></chat-component>
                </div>
                <div class="panel-footer">
                    <form-component
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></form-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
