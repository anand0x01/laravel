<?php

class WorkRoomController extends Controller
{
    public function get_index()
    {
        return View::make('workroom.get_index');
    }
}