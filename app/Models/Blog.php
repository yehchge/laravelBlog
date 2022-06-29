<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = array(
        'noteid',
        'title',
        'content',
        'userid',
        'created_at',
        'updated_at'
    );

    public function run($request){
        $user = DB::table('user')->where([
                    ['login', $_POST['login']],
                    ['password', MD5($_POST['password'])]
                ])->get();

        if(count($user)>0){
            $user_row = $user[0];

            $request->session()->put('role', $user_row->role);
            $request->session()->put('loggedIn', true);
            $request->session()->put('userid', $user_row->userid);

            $cookiehash = md5(sha1($user_row->login.self::sGetIP()));

            if (isset($_POST['remember'])) {
                setcookie('username', $cookiehash, time() + 3600 * 24 * 365, '/');
            } else {
                setcookie('username', $cookiehash, 0, '/');
            }

            DB::table('user')->where('userid',$user_row->userid)->update(['login_session'=>$cookiehash]);
        }
    }

    public function xhrInsert($request){
        $id = DB::table('data')->insertGetId(['text' => $_POST['text']]);

        $data = ['text' => $_POST['text'], 'id' => $id];
        echo json_encode($data);
    }

    public function edit($id){
        $aNote = DB::table('note')->where('noteid',$id)->get();
        if(count($aNote)>0)
            return $aNote[0];
        else
            return array();
    }

    public function editSave($id){
        DB::table('note')
            ->where('noteid', $id)
            ->update(['title' => $_POST['title'],'content' => $_POST['content']]);
    }

    public function deleteNote($id){
        DB::table('note')
            ->where('noteid', $id)
            ->delete();
    }

    public function xhrGetListings(){
        $result = DB::table('data')->get();
        echo json_encode($result);
    }

    public function xhrDeleteListing(){
        $id = (int) $_POST['id'];
        DB::table('data')->where('dataid', $id)->delete();
    }

    public function userList($request){
        $userid = $request->session()->get('userid');
        $aUser = DB::table('user')->get();
        return $aUser;
    }

    public function user_add(){
        $id = DB::table('user')->insertGetId(
            [
                'login' => $_POST['login'],
                'password' => MD5($_POST['password']),
                'role' => $_POST['role'],
                'login_session' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }

    public function user_del($id){
        DB::table('user')
            ->where('userid', $id)
            ->delete();
    }

    public function user_edit($id){
         $aUser = DB::table('user')->where('userid',$id)->get();
        if(count($aUser)>0)
            return $aUser[0];
        else
            return array();
    }

    public function userEditSave($id){

        $aValue = array('login' => $_POST['login'], 'role' => $_POST['role'], 'updated_at' => date('Y-m-d H:i:s'));
        if($_POST['password']) $aValue = array_merge($aValue, array('password' => MD5($_POST['password'])));

        DB::table('user')
            ->where('userid', $id)
            ->update($aValue);
    }

    public function noteList($request){
        $userid = $request->session()->get('userid');
        $aNote = DB::table('note')->where('userid', $userid)->get();
        return $aNote;
    }

    public function create($request){
        $userid = $request->session()->get('userid');
        $id = DB::table('note')->insertGetId(
            [
                'title' => $_POST['title'],
                'userid' => $userid,
                'content' => $_POST['content'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }

    public static function sGetIP()
    {
        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

}
