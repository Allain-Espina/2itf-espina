<?php

#Parent Class
class UserProfile
{
    #3 Private Member Variables
    private $inGameName;
    private $userID;
    private $serverCode;

    #Public Setter for $inGameName
    public function setIGN($inGameName)
    {
        $this->inGameName = $inGameName;
    }

    #Public Getter for $inGameName
    public function getIGN()
    {
        return $this->inGameName;
    }

    #Public Setter for $userID
    public function setID($userID)
    {
        $this->userID = $userID;
    }

    #Public Getter for $userID
    public function getID()
    {
        return $this->userID;
    }

    #Public Setter for $serverCode
    public function setServer($serverCode)
    {
        $this->serverCode = $serverCode;
    }

    #Public Getter for $userID
    public function getServer()
    {
        return $this->serverCode;
    }

    #Displays the value of each Member Variables
    public function displayInfo($user)
    {
        echo "<strong>IGN: </strong>" . $user->getIGN() . "<br>";
        echo "<strong>User ID: </strong>" . $user->getID() . "<br>";
        echo "<strong>Server Code: </strong>" . $user->getServer();
    }
}

#Child Class
class UserStats extends UserProfile
{

    private $role;

    #Parameterized Constructor
    function __construct($role)
    {
        $this->role = $role;
    }

    #Specialized Getter Method to obtain the value of the Member Variable
    public function getRole()
    {
        return $this->role;
    }

    #Method to print out the value of the Child Class' Member Variable
    public function printInfo($userStats)
    {
        echo "<br><strong>Role: </strong>" . $userStats->getRole();
    }
}

#Multilevel Inheritance
class UserLevel extends UserStats
{

    private $level;

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getLevel()
    {
        return $this->level;
    }

    #Overrides printInfo() method of UserStats
    public function printInfo($level)
    {
            if ($level <= 30) {
                echo "<br><strong>Level: </strong>" . $level . "<br>";
            }
            if ($level > 30) {
                echo "<br><strong>Celestial Level: </strong>" . $level . "<br>";
            }
    }
}

#Hierarchical Inheritance
class UserStreamInfo extends UserProfile
{

    private $streamInfo;

    public function setStreamInfo($streamInfo)
    {
        $this->streamInfo = $streamInfo;
    }

    public function getStreamInfo()
    {
        return $this->streamInfo;
    }

    #Overrides class UserStats' displayInfo method
    public function displayInfo($user)
    {
        echo "<strong>IGN: </strong>" . $user->getIGN() . "<br>";
        echo "<strong>User ID: </strong>" . $user->getID() . "<br>";
        echo "<strong>Streaming Platform: </strong>" . $user->getStreamInfo() . "<br>";
    }
}

#Creates the first instance of the Parent Class (UserProfile)
$user1 = new UserProfile();

#Setting the values of every Member Variables for $user1
$user1->setIGN("Psyche");
$user1->setID(2021150383);
$user1->setServer(1001);

#Calling the displayInfo() method to print out the value of $user1's member variables
$user1->displayInfo($user1);
echo "<br><br>";

$user2 = new UserProfile();

$user2->setIGN("Nomad");
$user2->setID(2021170385);
$user2->setServer(2002);
$user2->displayInfo($user2);
echo "<br><br>";

$user3 = new UserProfile();

$user3->setIGN("Shiro");
$user3->setID(2021180386);
$user3->setServer(3003);
$user3->displayInfo($user3);
echo "<br><br>";

#Creates the first instance of the Child Class (UserStats)
$user4 = new UserStats("Mage");
$user4->setIGN("Milkshake");
$user4->setID(2021190387);
$user4->setServer(4004);
$user4->displayInfo($user4);
$user4->printInfo($user4);
echo "<br><br>";

$user5 = new UserStreamInfo();

$user5->setIGN("humanRace");
$user5->setID(2021200388);
$user5->setServer(5005);

#Sets the value for the Multilevel Child Class' Member Variable
$user5->setStreamInfo("Youtube");

#Calls the overriden displayInfo() method
$user5->displayInfo($user5);
echo "<br><br>";

$user6 = new UserLevel("Support");

$user6->setIGN("Magnus");
$user6->setID(2021210389);
$user6->setServer(6006);

#Calls the overriden displayInfo() method
$user6->displayInfo($user6);
$user6->printInfo(30);
echo "<br><br>";
