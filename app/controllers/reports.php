<?php

class Reports extends Controller {
  private Report $report;
  
  function __construct() {
    $this->report = $this->model('Report');
  }
  
  public function index() {
    // redirect to reminders
    header('Location: /reports/reminders');
    die;
  }

  public function reminders() {
    $remindersReport = $this->report->getReminderReport();
    
    $this->view('reports/reminders', ['remindersReport' => $remindersReport]);
    die;
  }

  public function logins() {
    $loginsReport = $this->report->getLoginsReport();

    $this->view('reports/logins', ['loginsReport' => $loginsReport]);
    die;
  }
}