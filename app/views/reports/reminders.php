  <?php require_once 'app/views/templates/header.php' ?>
  <div class="container-fluid bg-light-subtle">

    <div class="row border-top">
      <div class="sidebar border-end col-md-3 col-lg-2 p-0">
        <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/reports">
                  <svg class="bi"><use xlink:href="#house-fill"></use></svg>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" href="/reports/reminders">
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
      <div class="container-fluid">
        <div class="row">
          <!-- 
            <pre><?php print_r($data['remindersReport']); ?></pre>
          -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Reminders</h1>
        </div>
        <div class="col-lg-7 col-xl-8 pe-lg-2 mb-3">
          <div class="card h-lg-100 overflow-hidden shadow">
            <div class="card-header py-3">
              <h6 class="mb-0 text-nowrap py-2 py-xl-0">All Reminders</h6>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive scrollbar">
                <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                  <thead class="border-bottom">
                    <tr>
                      <th class="bg-primary-subtle bg-gradient fw-medium ps-3">Username</th>
                      <th class="bg-primary-subtle bg-gradient fw-medium">Reminder</th>
                      <th class="bg-primary-subtle bg-gradient fw-medium pe-3">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['remindersReport']['allReminders'] as $reminder): ?>
                    <tr class="border-bottom border-200">
                      <td class="ps-3">
                        <?php echo $reminder['username']; ?>
                      </td>
                      <td class="align-middle fw-semi-bold">
                        <?php echo $reminder['subject']; ?>
                      </td>
                      <td class="align-middle pe-3">
                        <?php if($reminder['completed'] == 1): ?>
                          Completed <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                          </svg>
                        <?php else: ?>
                          Not Completed
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer bg-body-tertiary py-2 px-3">
              <div class="row flex-between-center">
                <div class="col-auto">
                  Total Reminders: <?php echo count($data['remindersReport']['allReminders']); ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-xl-4 ps-lg-2 mb-3">
          <div class="card h-lg-100 overflow-hidden shadow">
            <div class="card-header py-3">
              <h6 class="mb-0 text-nowrap py-2 py-xl-0">Reminders per user</h6>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive scrollbar">
                <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                  <thead class="border-bottom">
                    <tr>
                      <th class="bg-primary-subtle bg-gradient fw-medium ps-3">Username</th>
                      <th class="bg-primary-subtle bg-gradient fw-medium text-end pe-3">Reminders</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['remindersReport']['userReminders'] as $user): ?>
                    <tr class="border-bottom border-200">
                      <td class="ps-3">
                        <?php echo $user['username']; ?>
                      </td>
                      <td class="align-middle text-end pe-3">
                        <?php echo $user['total_reminders']; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>        
          </div>
        </div>
        </div>
      </div>
    </main>
  </div>

    <?php require_once 'app/views/templates/footer.php' ?>
