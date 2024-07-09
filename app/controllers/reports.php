<?php

class Reports extends Controller {
  public function index() {
    echo 'reports';
    die;
  }

  public function reminders() {
    $reminders = $this->model('Reminder');
    $allReminders = $reminders->fetchAllReminders();

    $this->view('reports/reminders', ['reminders' => $allReminders]);
    die;
  }

  public function logins() {
    echo 'reports/logins';
    die;
  }
}