<?php
/**
 * @author benyq
 * @emil 1520063035@qq.com
 * create at 2020/1/30
 * description:
 */
namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use App\Http\Models\UserModel;
use Illuminate\Support\Facades\Request;

class BookShelfController extends Controller {


    public function login(Request $request)
    {
        $users = UserModel::login();
        return $this->json_success($users, 'success');
    }


    public function test(Request $request)
    {
        $users = UserModel::list();
        return $this->json_success('dsds', 'success');
    }
}