<?php
session_start();
header('Content-type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
$act = isset($_GET['act']) ? $_GET['act'] : 'list';


define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

switch ($act) {
	case 'view-entry':
        if (!isset($_GET['id'])) die("Missing id parametr");
        $id = intval($_GET['id']);
        $ENTRY = $mysqli->query("SELECT * FROM entry WHERE id = $id")->fetch_assoc();
        
        $ENTRY['content'] = nl2br($ENTRY['content']);
        $ENTRY['header'] = htmlentities($ENTRY['header']);
        $comments = array();
        
        $sel = $mysqli->query("SELECT * FROM comments WHERE entry_id = $id ORDER BY date DESC");
        while ($row = $sel->fetch_assoc()){
			$row['date'] = date('Y-m-d H:i:s', $row['date']);
            $row['content'] = nl2br(htmlspecialchars($row['text']));
            $row['author'] = htmlentities($row['author']);
            $comments[] = $row;
		}
        
        if(!row) die("No such entry");
        require ('templates/entry.php');
        break;
	case 'list':
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        require_once(__DIR__ . "/model/Entry.php")
        $Entry = new Entry(2);
        $pages = ceil($Entry->getPagesCount());
        $records = $Entry->getEntries($page);
		foreach($records as &$row) {
			$row['date'] = date('Y-m-d H:i:s', $row['date']);
            $row['content'] = strip_tags(htmlspecialchars($row['content']));
            if(mb_strlen($row['content']) > 300) {
                $row['content'] = mb_substr(strip_tags($row['content'], 0, 297)) . "...";
            }
            unset($row);
            $row['content'] = nl2br($row['content']);
            $row['header'] = htmlentities($row['header']); 
		}
        require ('templates/list.php');
	   break;
    
    case'pre-login':
        if($_POST['login'] == 'login' && $_POST['pass'] == 'pass'){
            $_SESSION['IS_ADMIN'] = true;
            require ('templates/adminPage.php');
        }else{
            header('location: ?act=login');
        }
        break;
    case'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location: .');
        break;
    case 'login' :
            require ('templates/login.php');
            break;
    case 'do-new-entry':
            if(!IS_ADMIN) die('You do not have rights');
            $time = time();
            $sel = $mysqli->prepare("INSERT INTO entry (author, date, header, content) VALUES(?,?,?,?)");
            $sel ->bind_param('siss', $_POST['author'], $time, $_POST['header'], $_POST['content']);
            if($sel->execute()){
                header('Location: .');
            }else{
                die('cannot insert');
            }
        break;
    case 'apply-edit-entry':
            if(!IS_ADMIN) die('You do not have rights to edit entry');
            $id = intval($_POST['id']);
            $sel = $mysqli->prepare("UPDATE entry SET author = ?, header = ?, content = ? WHERE id = ?");

            $sel ->bind_param('sssi', $_POST['author'], $_POST['header'], $_POST['content'], $id);
            if($sel->execute()){
                header('Location: .');
            }else{
                die('cannot insert');
            }
        break;
    case 'del-entry':
            if(!IS_ADMIN) die('You do not have rights to delete entry');
            $id = intval($_GET['id']);
            $mysqli->query("DELETE FROM entry WHERE id = $id");
            $mysqli->query("DELETE FROM comment WHERE entry_id = $id");
            header('Location: .');
        break;
    case 'del-comment':
            if(!IS_ADMIN) die('You do not have rights to delete comment');
            $id = intval($_GET['id']);
            $mysqli->query("DELETE FROM comments WHERE id = $id") or die('cannot dell comment');
            header('Location: ?act=view-entry&id='.intval($_GET['entry_id']));
        break;
    case 'edit-entry':
        if(!IS_ADMIN) die('You do not have rights to edit entry');
         $id = intval($_GET['id']);
         $row = $mysqli->query("SELECT * FROM entry WHERE id = $id")->fetch_assoc();
         require('templates/edit-entry.php');
        break;
    case 'do-new-comment':
            $time = time();
            $sel = $mysqli->prepare("INSERT INTO comments (entry_id, author, date, text) VALUES(?,?,?,?)");
            $sel ->bind_param('isis', $_POST['entry_id'], $_POST['author'], $time, $_POST['comentText']);
            if($sel->execute()){
                header("Location: ?act=view-entry&id=".intval($_POST['entry_id']));
            }else{
                die('cannot insert');
            }
        break;
    default:
        die("No such action");
}
 ?>