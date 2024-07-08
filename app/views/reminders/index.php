<?php require_once 'app/views/templates/header.php' ?>
<div class="container">

  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col col-lg-8 col-xl-6">
    <div class="card rounded-3 shadow-sm">
      <div class="card-body p-4">
        <h2 class="me-2">Reminders</h2>

        <form method="post" action="/reminders/new" class="align-items-center d-flex gap-2">
          <div class="flex-grow-1">
            <label class="visually-hidden" for="inlineFormInputGroupUsername">Reminder</label>
            <div class="input-group">
            <input type="text" name="reminder" class="form-control" placeholder="New reminder..." autocomplete="off"  />
            </div>
          </div>

          <div>
            <button type="submit" class="btn btn-primary btn-sm">Add Reminder</button>
          </div>
        </form>        

        <hr />
        
        <ul class="list-group rounded-0">        
          <?php foreach ($data['reminders'] as $reminder): ?>
            <li class="list-group-item border-0 d-flex align-items-center justify-content-between ps-0">
              <div>
                
                <?php if($reminder['completed'] == 1): ?>
                  <s>
                <?php endif; ?>
                  
                <?php echo $reminder['subject']; ?>
                
                <?php if($reminder['completed'] == 1): ?>
                  </s>
                <?php endif; ?>
              </div>

              <div class="d-flex gap-2">
                <!-- toggle completion -->
                <form action="/reminders/complete" method="post">
                  <input type="hidden" name="reminder_id" value="<?php echo $reminder['id'] ?>" />
                  <button type="submit" class="btn btn-outline-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                      <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                    </svg>
                  </button>
                </form>

                <!-- delete reminder -->
                <form action="/reminders/delete" method="post">
                  <input type="hidden" name="reminder_id" value="<?php echo $reminder['id'] ?>" />
                  <button type="submit" class="btn btn-outline-danger btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path>
                    </svg>
                  </button>
                </form>
              </div>                
            </li>
          <?php endforeach; ?>
        </ul>
        
      </div>
    </div>
    </div>
  </div>

  <?php require_once 'app/views/templates/footer.php' ?>
