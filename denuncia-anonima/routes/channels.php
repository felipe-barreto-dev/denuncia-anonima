<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Denuncia.{id}', function ($report, $id) {
    return (int) $report->id === (int) $id;
});
