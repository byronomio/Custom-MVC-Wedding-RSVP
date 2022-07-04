<?php
class Pages extends Controller
{
  public function __construct()
  {
    $this->postModel = $this->model('User');
    
  }


  
  public function index()
  {

    if ($_SESSION['user_status'] == 'user') : 
      redirect('posts');
    endif;
    if (isset($_COOKIE['wedding_email'])) {
      unset($_COOKIE['wedding_email']);
      setcookie('wedding_email', '', time() - 3600, '/'); // empty value and old timestamp
    }
    $guests = $this->postModel->getGuests();
    
    

    $cooldrink = 0;
    $alcahol = 0;
    $water = 0;
    $meat = 0;
    $vegan = 0;
    $nothing = 0;
    $sleepover = 0;
    $sleephome = 0;
    $notsleeping = 0;

    foreach ($guests as $guest) {


      $prefferences = unserialize($guest->prefferences);
      $countprefferences = array_count_values($prefferences);
      ($countprefferences['Cooldrink']) ? $cooldrink++ : $cooldrink = $cooldrink;
      ($countprefferences['Alcahol']) ? $alcahol++ : $alcahol = $alcahol;
      ($countprefferences['Water']) ? $water++ : $water = $water;
      ($countprefferences['Meat']) ? $meat++ : $meat = $meat;
      ($countprefferences['Vegan']) ? $vegan++ : $vegan = $vegan;
      ($countprefferences['Nothing']) ? $nothing++ : $nothing = $nothing;
      ($countprefferences['Sleep Over']) ? $sleepover++ : $sleepover = $sleepover;
      ($countprefferences['Sleep Home']) ? $sleephome++ : $sleephome = $sleephome;
      ($countprefferences['Not Sleeping']) ? $notsleeping++ : $notsleeping = $notsleeping;
    }
    $attending = 0;
    $notattending = 0;
    foreach ($guests as $guest)  if ($guest->rsvp == '2') {
      $notattending++ ;
    }
    foreach ($guests as $guest)  if ($guest->rsvp == '1') {
      $attending++ ;
    }
    $data = [
      'title' => 'Wedding RSVP',
      'description' => 'Are you coming to our wedding?',
      'cooldrink' => $cooldrink,
      'alcahol' => $alcahol,
      'water' => $water,
      'meat' => $meat,
      'vegan' => $vegan,
      'nothing' => $nothing,
      'sleepover' => $sleepover,
      'sleephome' => $sleephome,
      'notsleeping' => $notsleeping,
      'guests' => $guests,
      'attending' => $attending,
      'notattending' => $notattending

    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Wedding RSVP',
      'description' => 'Welcome to my framework. I built this from scratch using PHP and the MVC method. The code is clean, easily readable and you would be able to build and expand it easily.'
    ];
    $email = $_COOKIE['wedding_email'];
    $this->view('pages/about', $data, $email);
  }
}
