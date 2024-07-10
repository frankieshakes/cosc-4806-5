<?php

class Reminder {

  public function __construct() {

  }

  public function fetchAllReminders() {
    $db = db_connect();
    $stmt = $db->prepare("select reminders.*, users.username from reminders left join users on reminders.user_id = users.id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function fetchUserReminders() {
    $db = db_connect();
    $stmt = $db->prepare("select * from reminders WHERE user_id = :user_id AND deleted = 0 ORDER BY created_at DESC;");
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function fetchReminderCounts() {
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

  public function toggleComplete($id) {
    $db = db_connect();
    // toggle column value (0 or 1)
    $stmt = $db->prepare("update reminders set completed = 1 - completed WHERE id = :id;");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $rows;
  }

  // Save new reminder for the logged-in user
  public function create($subject) {
    $db = db_connect();
    $stmt = $db->prepare('INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject)');
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->bindValue(':subject', $subject);
    return $stmt->execute();
  }

  public function delete($id) {
    $db = db_connect();
    // instead of deleting the record, we toggle column value (0 or 1)
    $stmt = $db->prepare("update reminders set deleted = 1 - completed WHERE id = :id;");
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }
}
