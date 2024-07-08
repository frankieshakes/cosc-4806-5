<?php

class Reminders extends Controller {
  public function index() {
    $reminders = $this->model('Reminder');
    $allReminders = $reminders->fetchAllReminders();

    $this->view('reminders/index', ['reminders' => $allReminders]);
    die;
  }

  public function new($param = '') {
    if ($_REQUEST['reminder']) {
      $reminder = $_REQUEST['reminder'];
  
      $reminders = $this->model('Reminder');
      $val = $reminders->create($reminder);
      if ($val) {
        header('Location: /reminders');
      } else {
        die(json_encode(['error' => 'There was a problem creating your reminder. Please try again later.']));
      }
    } else {
      header('Location: /reminders');
    }
  }

  public function complete($param = '') {
    if ($_REQUEST['reminder_id']) {
      $reminderId = $_REQUEST['reminder_id'];

      $reminders = $this->model('Reminder');
      $val = $reminders->toggleComplete($reminderId);

      header('Location: /reminders');
      die;
    }
  }

  public function delete($param = '') {
    if ($_REQUEST['reminder_id']) {
      $reminderId = $_REQUEST['reminder_id'];

      $reminders = $this->model('Reminder');
      $val = $reminders->delete($reminderId);

      header('Location: /reminders');
      die;
    }
  }
}