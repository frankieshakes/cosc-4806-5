<?php

class Report {

  public function __construct() {

  }

  public function getReminderReport() {
    $allReminders = $this->fetchAllReminders();
    $reminderCounts = $this->fetchReminderCounts();

    return array(
      "allReminders" => $allReminders,
      "userReminders" => $reminderCounts['userReminders'],
    );
  }

  public function getLoginsReport() {
    return $this->fetchLoginCounts();
  }

  private function fetchAllReminders() {
    $db = db_connect();
    $stmt = $db->prepare("select reminders.*, users.username from reminders left join users on reminders.user_id = users.id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  private function fetchReminderCounts() {
    $db = db_connect();

    // fetch total reminders count
    $result = $db->query("select count(*) from reminders");
    $count = $result->fetchColumn();

    // fetch count per user
    $stmt = $db->prepare("SELECT users.username, count( reminders.user_id ) as total_reminders FROM reminders LEFT JOIN users ON reminders.user_id = users.id GROUP BY users.id ORDER BY total_reminders DESC");

    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array(
      "totalReminders" => $count,
      "userReminders" => $rows
    );
  }

  private function fetchLoginCounts() {
    $db = db_connect();
    // fetch all logins, group by successful and failed attempts
    $stmt = $db->prepare("
      SELECT username,
          count(*) AS total,
          sum(case when successful_attempt = 1 then 1 else 0 end) AS success,
          sum(case when successful_attempt = 0 then 1 else 0 end) AS failure
      FROM auth_logs
      GROUP BY username
    ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
}
