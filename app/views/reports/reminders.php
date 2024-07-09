<?php require_once 'app/views/templates/header.php' ?>
<div class="container-fluid bg-light-subtle">

  <div class="row border-top border-bottom">
    <div class="sidebar border-end col-md-3 col-lg-2 p-0">
      <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" href="/reports">
                <svg class="bi"><use xlink:href="#house-fill"></use></svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/reports/reminders">
                <svg class="bi"><use xlink:href="#check2-square"></use></svg>
                Reminders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/reports/logins">
                <svg class="bi"><use xlink:href="#door-open-fill"></use></svg>
                Logins
              </a>
            </li>
            
          </ul>          
        </div>
      </div>
    </div>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Reminders</h1>
    </div>

    <h2>Reminders for All Users</h2>
    <div class="table-responsive small">
      <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Username</th>
                  <th scope="col">Reminder</th>
                  <th scope="col">Status</th>
      </tr>
      </thead>
                <tbody class="table-group-divider">
                  <?php foreach ($data['reminders'] as $reminder): ?>
                  <tr>
                    <td><?php echo $reminder['username']; ?></td>
                    <td>

                      <?php if($reminder['completed'] == 1): ?>
                        <s>
                      <?php endif; ?>

                      <?php echo $reminder['subject']; ?>

                      <?php if($reminder['completed'] == 1): ?>
                        </s>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($reminder['completed'] == 1): ?>
                        <p>Completed <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                        </svg></p>
                      <?php else: ?>
                        <p>Not Completed</p>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
    </div>
  </main>
</div>

  <?php require_once 'app/views/templates/footer.php' ?>
