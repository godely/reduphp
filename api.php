<?

class API {

  public $client;
  public $base_url;
  public $model_factory;

  public function __construct($consumer_key, $consumer_secret, $base_url, $model_factory) {
    $this->client = new HttpClient($consumer_key, $consumer_secret, $base_url);
    $this->base_url = $base_url;
    $this->model_factory = $model_factory;
  }

  public function getAuthorizeUrl() {
    return $this->client->getAuthUrl();
  }

  public function initClient($pin) {
    $this->client->initClient($pin);
  }

  public function getMe() {
        return new BinderAPI($this, array(
                'path' => 'me',
                'method' => 'get',
                'payload_type' => 'user'
        ));
  }

  public function getUser() {
        return new BinderAPI($this, array(
                'path' => 'users/%d',
                'method' => 'get',
                'payload_type' => 'user'
        ));
  }
 
  public function getUserBySpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d/users',
                  'method' => 'get',
                  'payload_type' => 'user'
          ));
  }
   
  public function getEnvironment() {
          return new BinderAPI($this, array(
                  'path' => 'environments/%d',
                  'method' => 'get',
                  'payload_type' => 'environment'
          ));
  }
   
  public function postEnvironment() {
          return new BinderAPI($this, array(
                  'path' => 'environments',
                  'method' => 'post',
                  'payload_type' => 'environment',
                  'payload_params' => array('name', 'path', 'initials', 'description')
          ));
  }
   
  public function editEnvironment() {
          return new BinderAPI($this, array(
                  'path' => 'environments/%d',
                  'method' => 'put',
                  'send_type' => 'environment',
                  'payload_params' => array('name', 'path', 'initials', 'description')
          ));
  }
   
  public function deleteEnvironment() {
          return new BinderAPI($this, array(
                  'path' => 'environments/%d',
                  'method' => 'delete'
          ));
  }
   
  public function getSubjectBySpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d/subjects',
                  'method' => 'get',
                  'payload_type' => 'subject'
          ));
  }
   
  public function getSubject() {
          return new BinderAPI($this, array(
                  'path' => 'subjects/%d',
                  'method' => 'get',
                  'payload_type' => 'subject'
          ));
  }
   
  public function getSpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d',
                  'method' => 'get',
                  'payload_type' => 'space'
          ));
  }
   
  public function editSpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d',
                  'method' => 'put',
                  'payload_params' => array('name', 'description'),
                  'send_type' => 'space'
          ));
  }
   
  public function postSpace() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d/spaces',
                  'method' => 'post',
                  'payload_type' => 'space',
                  'payload_params' => array('name', 'description')
          ));
  }
   
  public function getSpaceByCourse() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d/spaces',
                  'method' => 'get',
                  'payload_type' => 'space'
          ));
  }
   
  public function deleteSpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d',
                  'method' => 'delete'
          ));
  }
   
  public function getStatus() {
          return new BinderAPI($this, array(
                  'path' => 'statuses/%d',
                  'method' => 'get',
                  'payload_type' => 'status'
          ));
  }
   
  public function getAnswers() {
          return new BinderAPI($this, array(
                  'path' => 'statuses/%d/answers',
                  'method' => 'get',
                  'payload_type' => 'status'
          ));
  }
   
  public function postAnswer() {
          return new BinderAPI($this, array(
                  'path' => 'statuses/%d/answers',
                  'method' => 'post',
                  'payload_type' => 'status',
                  'payload_params' => array('text')
          ));
  }
   
  public function getStatusByUser() {
          return new BinderAPI($this, array(
                  'path' => 'users/%d/statuses',
                  'method' => 'get',
                  'payload_type' => 'status',
                  'query_params' => array('type', 'page')
          ));
  }
   
  public function getTimelineByUser() {
          return new BinderAPI($this, array(
                  'path' => 'users/%d/statuses/timeline',
                  'method' => 'get',
                  'payload_type' => 'status',
                  'query_params' => array('type', 'page')
          ));
  }
   
  public function postStatusByUser() {
          return new BinderAPI($this, array(
                  'path' => 'users/%d/statuses',
                  'method' => 'post',
                  'payload_type' => 'status',
                  'query_params' => array('text')
          ));
  }
   
  public function getTimelineBySpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d/statuses/timeline',
                  'method' => 'get',
                  'payload_type' => 'status',
                  'query_params' => array('type', 'page')
          ));
  }
   
  public function getStatusBySpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d/statuses',
                  'method' => 'get',
                  'payload_type' => 'status',
                  'query_params' => array('type', 'page')
          ));
  }
   
  public function postStatusSpace() {
          return new BinderAPI($this, array(
                  'path' => 'spaces/%d/statuses',
                  'method' => 'post',
                  'payload_type' => 'status',
                  'query_params' => array('text')
          ));
  }
   
  public function getStatusByLecture() {
          return new BinderAPI($this, array(
                  'path' => 'lectures/%d/statuses',
                  'method' => 'get',
                  'payload_type' => 'status',
                  'query_params' => array('type', 'page')
          ));
  }
   
  public function postStatusLecture() {
          return new BinderAPI($this, array(
                  'path' => 'lectures/%d/statuses',
                  'method' => 'post',
                  'payload_type' => 'status',
                  'query_params' => array('text')
          ));
  }
   
  public function deleteStatus() {
          return new BinderAPI($this, array(
                  'path' => 'statuses/%d',
                  'method' => 'delete'
          ));
  }
   
  public function getCourse() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d',
                  'method' => 'get',
                  'payload_type' => 'course'
          ));
  }
   
  public function postCourse() {
          return new BinderAPI($this, array(
                  'path' => 'environments/%d/courses',
                  'method' => 'post',
                  'payload_type' => 'course',
                  'query_params' => array('text', 'path', 'description', 'workload')
          ));
  }
   
  public function editCourse() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d',
                  'method' => 'put',
                  'send_type' => 'course',
                  'payload_params' => array('name', 'path', 'description', 'workload')
                 
          ));
  }
   
  public function getCoursesByEnvironment() {
          return new BinderAPI($this, array(
                  'path' => 'environments/%d/courses',
                  'method' => 'get',
                  'payload_type' => 'course'
          ));
  }
   
  public function deleteCourse() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d',
                  'method' => 'delete'
          ));
  }
   
  public function getEnrollment() {
          return new BinderAPI($this, array(
                  'path' => 'enrollments/%d',
                  'method' => 'get',
                  'payload_type' => 'enrollment'
          ));
  }
   
  public function postEnrollment() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d/enrollments',
                  'method' => 'post',
                  'payload_type' => 'enrollment',
                  'payload_params' => array('email')
          ));
  }
   
  public function getEnrollmentByCourse() {
          return new BinderAPI($this, array(
                  'path' => 'courses/%d/enrollments',
                  'method' => 'get',
                  'payload_type' => 'enrollment'
          ));
  }
   
  public function deleteEnrollment() {
          return new BinderAPI($this, array(
                  'path' => 'enrollments/%d',
                  'method' => 'delete'
          ));
  }
   
  public function getChatsByUser() {
          return new BinderAPI($this, array(
                  'path' => 'users/%d/chats',
                  'method' => 'get',
                  'payload_type' => 'chat'
          ));
  }
   
  public function getChat() {
          return new BinderAPI($this, array(
                  'path' => 'chats/%d',
                  'method' => 'get',
                  'payload_type' => 'chat'
          ));
  }
   
  public function getChatMessagesByChat() {
          return new BinderAPI($this, array(
                  'path' => 'chats/%d/chat_messages',
                  'method' => 'get',
                  'payload_type' => 'chat_message'
          ));
  }
   
  public function getChatMessage() {
          return new BinderAPI($this, array(
                  'path' => 'chat_messages/%d',
                  'method' => 'get',
                  'payload_type' => 'chat_message'
          ));
  }

}

?>