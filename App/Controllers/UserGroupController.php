<?php  

namespace App\Controllers;

use App\core\Request;
use App\Models\User;
use App\Models\Groups;

class UserGroupController{
    private $UserModel;
    private $groupsModel;
    public function __construct(){
        $this->UserModel = new User();
        $this->groupsModel = new groups();
    }

    public function index()
    {
        $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
        $data['groups'] = $this->groupsModel->get('*',[]);
        view('user.index', $data);
    }

    public function Userform()
    {
        $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
        $data['groups'] = $this->groupsModel->get('*',[]);
        view('user.UserForm', $data);
    }

    public function UserEdit()
    {
        global $request;
        $id = $request->get_route_param('id');
        $out['groups'] = $this->groupsModel->get('*',[]);
        $data = $this->UserModel->get(["id","Fname","Lname","MeliCode","Address","PostalCode","Gender","group_name "], ["id"=>$id]);
        foreach ($data as $user) {

        }
        $out['user'] = $user;
        view('user.UserEditForm',$out);   
    }

    public function AdduserEdit()
    {
        global $request;
        $userInfo = [
            "Fname"=>$request->input('FirstName'),
            "Lname"=>$request->input('LastName'),
            "MeliCode"=>$request->input('MelliCode'),
            "Address"=>$request->input('Address'),
            "PostalCode"=>$request->input('PostalCode'),
            "Gender"=>$request->input('gender'),
            "group_name"=>$request->input('group'),
        ]; 

        $MelliCount = $this->UserModel->get("MeliCode" ,["MeliCode"=>$userInfo['MeliCode']]);

        $data['id'] = $request->input('id');
        if (count($MelliCount) == 1) {
            $count =count($this->UserModel->get('MeliCode' ,["AND" => [
                "MeliCode"=>$request->input('MelliCode'),
                "id"=>$request->input('id')
            ]]));

            if ($count == 1) {
                    $data['status']= true;
                    $count = $this->UserModel->update($userInfo, ["id"=>$request->input('id')]);
                    view('user.user-edit',$data); 
            }
            else 
            {
                    $data['status'] = false;
                    view('user.user-edit',$data);    
            }
        }
        elseif(count($MelliCount) == 0)
        {
            $data['status']= true;
            $count = $this->UserModel->update($userInfo, ["id"=>$request->input('id')]);
            view('user.user-edit',$data);   
        }
    }

    public function Useradd()
    {
        global $request;
        $userInfo = [
            "Fname"=>$request->input('FirstName'),
            "Lname"=>$request->input('LastName'),
            "MeliCode"=>$request->input('MelliCode'),
            "Address"=>$request->input('Address'),
            "PostalCode"=>$request->input('PostalCode'),
            "Gender"=>$request->input('gender'),
            "group_name"=>$request->input('group'),
        ];
        $MelliCount = $this->UserModel->get('MeliCode' ,["MeliCode"=>$request->input('MelliCode')]);
        if (count($MelliCount) == 0) {
            $data['status']= true;
            $count = $this->UserModel->create($userInfo);
            view('user.add-user',$data);    
        }else {
            $data['status'] = false;
            view('user.add-user',$data);    
        }
    }

    public function Userdelete()
    {
        global $request;
        $id = $request->get_route_param('id');
        $data['deleted_count'] = $this->UserModel->delete(["id"=>$id]);
        view('user.delete-result',$data);    
    }

    public function GroupsTable()
    {
        $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
        $data['groups'] = $this->groupsModel->get('*',[]);
        view('group.GroupTable', $data);
    }

    public function Groupform()
    {
        $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
        $data['groups'] = $this->groupsModel->get('*',[]);
        view('group.GroupForm', $data);
    }

    public function GroupEdit()
    {
        global $request;
        $id = $request->get_route_param('id');
        $data = $this->groupsModel->get(["Gname","id"], ["id"=>$id]);
        foreach ($data as $group) {

        }
        view('group.GroupEditForm',$group);   
    }

    public function AddGroupEdit()
    {
        global $request;
        $id = $request->input('id');
        $Gname = $request->input('Gname');

        $groupCount = $this->groupsModel->get("Gname" ,["Gname"=>$Gname]);

        if (count($groupCount) == 1) {
            $data['status'] = false;
            view('group.group-edit',$data);  
        }
        else{
            $data['status'] = true;
            $data['editedCount'] = $this->groupsModel->update(["Gname"=>$Gname], ["id"=>$id]);
            view('group.group-edit',$data);  
        }
    }
    

    public function Groupadd()
    {
        global $request;
        $groupName = $request->input('group');

        $Count = $this->groupsModel->count(["Gname"=>$groupName]);
        if ($Count == 0) {
            $data['status'] = true;
            $data['Gname'] = $this->groupsModel->create(["Gname"=>$groupName]);
        }else {
            $data['status'] = false;
        }
        view('group.add-group',$data);    
    }

    public function Groupdelete()
    {
        global $request;
        $id = $request->get_route_param('id');

        $Gname =  $this->groupsModel->get('Gname', ["id"=>$id])[0];

        $count = $this->UserModel->count(["group_name"=>$Gname]);
        if ($count > 0) {
            $data['status'] = false;
            view('group.delete-result',$data);    
        }
        else 
        {
            $data['status'] = true;
            $data['deleted_count'] = $this->groupsModel->delete(["id"=>$id]);
            view('group.delete-result',$data);    
        }
    }
    
}
?>