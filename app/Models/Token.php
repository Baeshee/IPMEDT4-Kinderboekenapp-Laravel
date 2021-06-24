<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    protected $primaryKey = 'id';
    protected $table = 'tokens';
    protected $fillable = array(
      'user_id',
      'value',
      'jti',
      'type',
      'pair',
      'status',
      'payload'
    );

    protected $casts = [
      'payload' => 'array'
    ];

    function user() {
      return $this->belongsTo( 'App\Models\User' );
    }

    public static function findByValue( $value ){
        $token_obj=Token::where('value', $value)->first();
  
        if ( $token_obj ) return $token_obj;
  
        return null;
      }
      
      public static function findPairByValue( $token ){
        $token_obj = self::findByValue( $token );
        return Token::find( $token_obj->pair );
      }
}