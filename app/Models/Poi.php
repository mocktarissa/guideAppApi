<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Poi extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    // public function getWithCategory($gameId, $playerId)
    // {
    //     $gameData = C::with(['GamePlayer.User:id,name,unique_id'])
    //         ->where('id', $gameId)
    //         ->whereHas(
    //             'GamePlayer',
    //             function ($q) use ($playerId) {
    //                 $q->where('player_id', $playerId);
    //             }
    //         )->first();
    //     return $gameData;
    // }
}
