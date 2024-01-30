<?php
// Start the session (if not already started)
session_start();

// Include your login logic
include 'login.php';

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header('Location: login.html'); // Change to the actual login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylesheet.css" />
    <title>Maintenance</title>
  </head>
  <body>
    <h1>Maintenance Page</h1>

    <h2>Insert Queries:</h2>
    <ul class="insert_pages">
      <li><a href="insert_queries/users.html" class="insert_page">Users</a></li>
      <li><a href="insert_queries/clubs.html" class="insert_page">Clubs</a></li>
      <li>
        <a href="insert_queries/club_participants.html" class="insert_page"
          >Club Participants</a
        >
      </li>
      <li>
        <a href="insert_queries/club_leaders.html" class="insert_page"
          >Club Leaders</a
        >
      </li>
      <li>
        <a href="insert_queries/club_moderators.html" class="insert_page"
          >Club Moderators</a
        >
      </li>
      <li>
        <a href="insert_queries/club_members.html" class="insert_page"
          >Club Members</a
        >
      </li>
      <li>
        <a href="insert_queries/events.html" class="insert_page">Events</a>
      </li>
      <li>
        <a href="insert_queries/club_events.html" class="insert_page"
          >Club Events</a
        >
      </li>
      <li>
        <a href="insert_queries/personal_events.html" class="insert_page"
          >Personal Events</a
        >
      </li>
      <li>
        <a href="insert_queries/event_participants.html" class="insert_page"
          >Event Participants</a
        >
      </li>
      <li>
        <a href="insert_queries/event_hosts.html" class="insert_page"
          >Event Hosts</a
        >
      </li>
      <li>
        <a href="insert_queries/event_attendees.html" class="insert_page"
          >Event Attendees</a
        >
      </li>
    </ul>

    <h2>Search Queries:</h2>
    <ul class="search_pages">
      <li><a href="search_queries/users.html" class="search_page">Users</a></li>
      <li><a href="search_queries/clubs.html" class="search_page">Clubs</a></li>
      <li>
        <a href="search_queries/events.html" class="search_page">Events</a>
      </li>
      <li>
        <a href="search_queries/club_participants.html" class="search_page"
          >Club Participants</a
        >
      </li>
    </ul>
    <h2>Search by autocompletion</h2>
    <ul class="auto">
      <li><a href="autocomplete_search/auto_user/auto.html">Users</a></li>
      <li><a href="autocomplete_search/auto_clubs/autoclub.html">Clubs</a></li>
      <li>
        <a href="autocomplete_search/autocomplete_events/autoev.html">Events</a>
      </li>
      <li>
        <a href="autocomplete_search/auto_clb_particip/auto_particip.html"
          >Club Participants</a
        >
      </li>
    </ul>
    <h3>AUTOCOMPLETE DEMO:</h3>
    <ul class="demo">
      <li><a href="../maintenance/demo/demo.html" class="demo">DEMO</a></li>
    </ul>
  </body>
</html>
