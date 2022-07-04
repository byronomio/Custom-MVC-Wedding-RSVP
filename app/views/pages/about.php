<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="card card-body">  <h1 class="mt-0"><?php echo $data['title']; ?></h1>
  
  <p><?php echo $data['description']; ?></p>
  <p><strong>What you can currently do with this:</p></strong>
<ul>
 	<li class="p3">One of the features are that you can RSVP to a wedding, say whether you are going or not, and if you are, choose from different options such as your preferred food, drinks and if you are sleeping over.</li>
 	<li class="p3">Users can also add posts on the Guestbook and comment on other posts, they can also edit and delete their own posts.</li>
</ul>
<br/>
<p><strong>If not logged in:</p></strong>
<ul>
 	<li class="p3">Main page - RSVP button and information</li>
 	<li>Register</li>
 	<li>Login</li>
</ul>
<br/>
<p><strong>RSVP Page:</p></strong>
<ul>
 	<li class="p3">Fill in your name, email, and if you are going.</li>
 	<li class="p3">If no, it will save your name, email and answer and redirect you back to main page with a thank you flash message.</li>
 	<li class="p3">If yes, it will redirect to the next page and give you 3 options to choose from for the wedding. Drinks, Food and if you are sleeping over. Once this filled in and you click<span class="Apple-converted-space">  </span>submit, it will save your data and redirect you back to the main page with a thank you flash message.</li>
</ul>
<br/>
<p><strong>Registration Page:</p></strong>
<ul>
 	<li class="p3">Once registered, you will be redirected to the login page.</li>
 	<li class="p3">Once logged in, a normal user will be directed to the Guestbook page where they can create, edit and delete their own posts.</li>
 	<li class="p3">Users can also comment on other posts and all comments will show on the posts.</li>
</ul>
<br/>
<p><strong>Admin User:</p></strong>
<ul>
 	<li class="p3">For an admin user their main page consists of statistics populated by all the reservation forms filled in.</li>
 	<li class="p3">Analytics on who is attending and who isn’t</li>
 	<li class="p3">Amount of drinks, food, and sleep over itemised and counted per option on 3 different cards (preferences)</li>
 	<li class="p3">Chart with all the preferences</li>
 	<li class="p3">Table with names on who is attending and who isn’t</li>
</ul>
<br/>
<p class="p3">I’ll continue to work on this and expand it. I hope you like it.</p>
&nbsp;
<p>Version: <strong><?php echo APPVERSION; ?></strong></p>
<p class="p3"><strong>byron@mywebs.co.za</strong></p>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
