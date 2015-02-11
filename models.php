<?

class Model {
  public $links;
  public $created_at;
  public $updated_at;
  public $id;

  public function __construct() {
    $this->links = null;
    $this->created_at = null;
    $this->updated_at = null;
    $this->id = null;
  }

  public function parse($data, $modelFactory) {
    $vars = get_object_vars($this);

    foreach ($vars as $key => $val) {
      if (isset($vars[$key])) {
        $value = $val;
        if ($key == "created_at" || $key == "updated_at") {
          $matches = [];
          preg_match("\d+-\d+-[T\d]+:\d+:\d+", $value, $matches);
          if (count($matches) > 0) {
            $value = strptime($matches[0], '%Y-%m-%dT%H:%M:%S');
          }
        } else {
          $tipo = $modelFactory[$key];
          $inner = new $tipo;
          $inner.parse($value, $modelFactory);
          $value = $inner;
        }
        $vars[$key] = $value;
      }
    }
  }
}

class User extends Model {
  public $login;
  public $mobile;
  public $email;
  public $localization;
  public $friends_count;
  public $last_name;
  public $first_name;
  public $birthday;
  public $birth_localization;
  public $social_networks;

  public function __construct() {
    $vars = get_object_vars($this);
    foreach ($vars as $key => $val) {
      $vars[$key] = null;
    }
  }

  public function parse($data, $modelFactory) {
    parent::parse($data, $modelFactory);
    if (isset($data['birthday'])) {
      $this->birthday = new DateTime($data['birthday']);
    }
  }
}

class Environment extends Model {
  public $name;
  public $initials;
  public $path;
 
  public function __construct() {
      $vars = get_object_vars($this);
      foreach ($vars as $key => $val) {
        $vars[$key] = null;
      }
  }
}
 
class Status extends Model {
  public $type;
  public $user;
  public $text;
 
  public function __construct() {
      $vars = get_object_vars($this);
      foreach ($vars as $key => $val) {
        $vars[$key] = null;
      }
  }
}

class Enrollment extends Model {
  public $token;
  public $state;
  public $email;
 
  public function __construct() {
      $vars = get_object_vars($this);
      foreach ($vars as $key => $val) {
        $vars[$key] = null;
      }
  }
}

class Space extends Model {
  public $name;
  public $description;
 
  public function __construct() {
      $vars = get_object_vars($this);
      foreach ($vars as $key => $val) {
        $vars[$key] = null;
      }
  }
}

class Course extends Model {
  public $name;
  public $created_at;
  public $workload;
  public $path;
 
  public function __construct() {
      $vars = get_object_vars($this);
      foreach ($vars as $key => $val) {
        $vars[$key] = null;
      }
  }
}

class ChatMessage extends Model {
  public $message;
 
  public function __construct() {
      $vars = get_object_vars($this);
      foreach ($vars as $key => $val) {
        $vars[$key] = null;
      }
  }
}
?>
