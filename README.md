<h1>HomeHive</h1>
<p>
  A unified subdivision management system developed with <b>Laravel</b>. This system is accomplished as a capstone project in <b>Angeles University Foundation</b> under the <b>College of Computer Studies</b>, serving as a requirement for the Degree of <b>Bachelor of Science in Information Technology.</b>
</p>

<h3>Developers</h3>
<ul>
  <li>
    <b>Andrei Joaqhim Ali B. Agbisit</b><br>
    <i>Scrum Master, Lead Developer</i>
  </li>
</ul>

<ul>
  <li>
    <b>Jio Rhey B. Detros</b><br>
    <i>Back-end Developer</i>
  </li>
</ul>

<ul>
  <li>
    <b>Edlan Vere V. Perez</b><br>
    <i>Software Quality Assurance</i>
  </li>
</ul>

<ul>
  <li>
    <b>Terrence Liam C. Tongol</b><br>
    <i>Front-end Developer</i>
  </li>
</ul>

<hr>

<h2>Features</h2>
<ul>
  <li>
    <b>Super admin account type (exclusive)</b>
  </li>
</ul>

<table>
  <tr>
    <th><b>Function</b></th>
    <th><b>Description</b></th>
  </tr>

  <tr>
    <td>
      <b>Role management</b>
    </td>
    <td>Enables super admins to view and edit roles assigned to each user account.</td>
  </tr>
</table>

<ul>
  <li>
    <b>Super admin/admin account type</b>
  </li>
</ul>

<table>
  <tr>
    <th><b>Function</b></th>
    <th><b>Description</b></th>
  </tr>

  <tr>
    <td>
      <b>Account management</b>
    </td>
    <td>Enables super admins and admins to add, view, edit, and delete accounts in the system. These account types may also mark an account’s email address as either verified or unverified.</td>
  </tr>

  <tr>
    <td>
      <b>Collection management</b>
    </td>
    <td>
        Super admins and admins are able to add payment notices and track the payment status of each household. The system also permits super admins and admins to add, edit, and delete collection categories, 
        as well as payment collectors for the GCash payment option.
    </td>
  </tr>

  <tr>
    <td>
      <b>Bulletin board management</b>
    </td>
    <td>
        Super admins and admins can add, edit, and delete bulletin board entries in an online bulletin board with a calendar-based interface. Super admins and admins are also allowed to add, edit, and delete 
        entry categories, as well as picking their color of choice for the categories present in the bulletin board via a color picker.
    </td>
  </tr>

  <tr>
    <td>
      <b>Facility reservation management</b>
    </td>
    <td>
        Besides tracking the reservation status of each facility within the subdivision, super admins and admins are able to add and remove facilities available for households. Users can also modify the fees 
        charged during reservation.
    </td>
  </tr>

  <tr>
    <td>
      <b>Vehicle sticker application management</b>
    </td>
    <td>
        Super admins and admins can track pending appointments for households to obtain the subdivision’s car sticker. Fees charged in obtaining a sticker and the payment status for the households’ 
        application entries can also be modified.
    </td>
  </tr>

  <tr>
    <td>
      <b>Report generation</b>
    </td>
    <td>
        Allows super admins and admins to generate a report that can be downloaded to their system via a .PDF file. The report may contain entries for collection management, facility reservation, 
        and vehicle sticker application.
    </td>
  </tr>
</table>

<ul>
  <li>
    <b>Standard user account type</b>
  </li>
</ul>

<table>
  <tr>
    <th><b>Function</b></th>
    <th><b>Description</b></th>
  </tr>

  <tr>
    <td>
      <b>Account registration</b>
    </td>
    <td>New users can register an account via the system’s login screen. A registration form will be provided for users in order for the accounts to be created.</td>
  </tr>

  <tr>
    <td>
      <b>Payment processing</b>
    </td>
    <td>Users can process their pending payments mandated by the HOA officers through a payment form. The system provides two payment methods: on-site payment or online via GCash.</td>
  </tr>

  <tr>
    <td>
      <b>Bulletin board viewing</b>
    </td>
    <td>
        Provides an online bulletin board. With a calendar-based layout, users can view bulletin board entries placed in each date and clicking or tapping on each entry reveals their 
        details. Each entry is categorized based on the subject, and the categories are color coded.
    </td>
  </tr>

  <tr>
    <td>
      <b>Facility reservation</b>
    </td>
    <td>
        Users can process facility reservations within the system. They can select the available date and time slot provided in a form. Just as with payment processing, users can 
        choose from on-site payment or GCash as payment options to pay for the reservation fee.
    </td>
  </tr>

  <tr>
    <td>
      <b>Vehicle sticker application</b>
    </td>
    <td>
        Users may avail for a subdivision car sticker through the system by accomplishing a vehicle sticker application form. For the payment option, users can choose from 
        on-site payment or GCash as payment options to pay for the reservation fee.
    </td>
  </tr>
</table>

<ul>
  <li>
    <b>All account types</b>
  </li>
</ul>

<table>
  <tr>
    <th><b>Function</b></th>
    <th><b>Description</b></th>
  </tr>

  <tr>
    <td>
      <b>Email verification</b>
    </td>
    <td>
        When logging in an account for the first time, the system prompts users of any account type to verify their email address utilized with the account, mitigating 
        the instances of fake or spam accounts.
    </td>
  </tr>
</table>

<hr>

<h2>Tech Stack</h2>
<table>
  <tr>
    <th><b>Name</b></th>
    <th><b>Details</b></th>
  </tr>
  
  <tr>
    <td>
      <b>Laravel 11.9</b>
    </td>
    <td>Back-end</td>
  </tr>
  
  <tr>
    <td>
      <b>MySQL</b><br>
      <b>Azure Blob Storage</b><br>
      <code>laravel-azure-storage</code> <b>2.0</b>
    </td>
    <td>Database</td>
  </tr>

  <tr>
    <td>
      <b>Dompdf 3.0.0</b>
    </td>
    <td>HTML to PDF converter</td>
  </tr>

  <tr>
    <td>
      <b>Blade</b><br>
      <b>Bootstrap 4.6.0</b><br>
      <b>SB Admin 2 4.1.3</b><br>
    </td>
    <td>UI</td>
  </tr>

  <tr>
    <td>
      <b>FullCalendar</b>
    </td>
    <td>Bulletin board management</td>
  </tr>

  <tr>
    <td>
      <b>RichTextEditor 1.015</b>
    </td>
    <td>WYSIWYG HTML editor</td>
  </tr>
</table>

<hr>

<h2>Setup</h2>

<h3>Getting Started</h3>

<ul>
  <li><b>Running the project locally</b></li>
</ul>

<pre><code># Clone this repository
git clone https://github.com/andreiagbisit/homehive.git
  
# Install all packages
composer install

# Generate application key
php artisan key:generate

# Apply migrations to update the database schema
php artisan migrate
  
# Start the local development server of the application 
php artisan serve</code></pre>

<hr>
