<?php
	session_start();
	include("inc.php");
    $username	= isset($_POST['username']) ? trim($_POST['username']) : '';
    $password	= isset($_POST['password']) ? trim($_POST['password']) : '';
    $email		= isset($_POST['email']) ? trim($_POST['email']) : '';
	$other		= isset($_POST['other']) ? $_POST['other'] : array();
	$action		= isset($_POST['action']) ? trim($_POST['action']) : '';

/* ע���»�Ա */
if ($action == 'register')
{
    if(empty($_POST['agreement']))
    {
	   echo "- ��û�н���Э��";
    }
    elseif (strlen($username) < 3)
    {
		echo "- �û������Ȳ������� 3 ���ַ���";
    }

    elseif (strlen($password) < 6)
    {
	   echo "- ��¼���벻������ 6 ���ַ���";
    }
	
	else
	{
		$sql = "Insert users (user_name,email,`password`,msn,qq,office_phone,home_phone,mobile_phone,reg_time,visit_count) values ('" . $username . "','" . $email . "',md5('" . $password . "'),'" . $other['msn'] ."','" . $other['qq'] . "','" . $other['office_phone'] . "','" . $other['home_phone'] . "','" . $other['mobile_phone'] . "',now(),1)";

		if($db->query($sql))
		{
			$_SESSION['username']   = $username;
			$_SESSION['user_id']    = $db->insert_id();
			$_SESSION['visit']	    = 1;
			$_SESSION['user_login'] = 1;
			$_SESSION['etc']	    = "���ѳɹ�ע��Ϊ��վ��Ա��";
			header("Location:user_index.php");
		}
	}

}

/* ��Ա�޸����� */
if ($action == 'mod')
{
	$sql = "update users set email='" . $email . "',msn='" . $other['msn'] . "',qq='" . $other['qq'] . "',office_phone='" . $other['office_phone'] . "',home_phone='" . $other['home_phone'] . "',mobile_phone='" . $other['mobile_phone'] . "' where user_id = '" . $_SESSION['user_id'] . "'";

	if($db->query($sql))
	{
		$_SESSION['etc'] = "���ѳɹ��޸��˻�Ա���ϣ�";
		header("Location:user_index.php");
	}
}

/* ��֤�û�ע���û����Ƿ����ע�� */
elseif ($action == 'check_user')
{
    if (strlen($username) < 3)
    {
		echo "- �û������Ȳ������� 3 ���ַ���";
    }
	elseif(!check_user($username))
	{
		echo "* �û����Ѿ�����,����������";
	}
	else
	{
		echo "* ����ע��";
	}
    //$username = trim($_GET['username']);
}

/* ��֤�û������ַ�Ƿ�ע�� */
elseif($action == 'check_email')
{
    $email = trim($_POST['email']);
    if (!check_email($email))
    {
        echo "* �����Ѵ���,����������";
    }
    else
    {
        echo "* ����ע��";
    }
}

/* ��֤�û����޸ĵ������ַ�Ƿ�ע�� */
elseif($action == 'check_mod_email')
{
    $email = trim($_POST['email']);
	if (!check_mod_email($username,$email))
	{
		echo "* �����Ѵ���,����������";
	}
	else
	{
		echo "* ���Ը���Ϊ������";
	}
}

/* ��Ա�ϴ���Ƭ */
if ($action == 'upload')
{
	if (!move_uploaded_file($_FILES['upload_file']['tmp_name'],"member_photo/" . $_SESSION['user_id'] . ".jpg")) {
		$_SESSION['etc'] = "�ϴ���Ƭʧ�ܣ��������ϴ���";
	}
	else
	{
		$_SESSION['etc'] = "���ѳɹ��ϴ���Ƭ��";
	}
		header("Location:user_index.php");
}



function check_user($username)
{
	global $db;
	if($db->getOne("select count(*) from users where user_name='" . $username . "'") > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function check_email($email)
{
	global $db;
	if($db->getOne("select count(*) from users where email='" . $email . "'") > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function check_mod_email($user_name,$email)
{
	global $db;
	if($db->getOne("select count(*) from users where user_name<>" . $user_name . " and email='" . $email . "'") > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

?>