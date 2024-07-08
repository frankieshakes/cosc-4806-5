<?php

class Reminder {

  public function __construct() {

  }

  public function fetchAllReminders () {
    $db = db_connect();
    $stmt = $db->prepare("select * from reminders WHERE user_id = :user_id AND deleted = 0 ORDER BY created_at DESC;");
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
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
