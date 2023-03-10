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
        echo "<strong>IGN: </strong>" . $this->getIGN() . "<br>";
        echo "<strong>User ID: </strong>" . $this->getID() . "<br>";
        echo "<strong>Server Code: </strong>" . $this->getServer();
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
        echo "<br><br><strong>Role: </strong>" . $this->getRole() . "<br>";
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

    #Overloads printInfo() method of UserStats
    public function printInfo($level)
    {
        if(is_numeric($level)){
            if ($level <= 30) {
                echo "<br><strong>Level: </strong>" . $level . "<br>";
            }
            if ($level > 30) {
                echo "<br><strong>Celestial Level: </strong>" . $level . "<br>";
            }
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
        echo "<strong>IGN: </strong>" . $this->getIGN() . "<br>";
        echo "<strong>User ID: </strong>" . $this->getID() . "<br>";
        echo "<strong>Streaming Platform: </strong>" . $this->getStreamInfo() . "<br>";
    }
}

#Creates the first instance of the Parent Class (UserProfile)
$user1 = new UserProfile();

#Setting the values of every Member Variables for $user1
$user1->setIGN("Psyche");
$user1->setID(2021150383);
$user1->setServer(1001);

#Calling the displayInfo() method to print out the value of $user1's member variables
echo "<strong>Parent Class (UserProfile): 3 Instances</strong><br>";
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
echo "<hr>";
echo "<strong>Child Class (UserStats): Single Level (Parent: UserProfile)</strong><br>";
$user4->displayInfo($user4);
$user4->printInfo($user4);
echo "<br>";

$user5 = new UserStreamInfo();

$user5->setIGN("humanRace");
$user5->setID(2021200388);
$user5->setServer(5005);

#Sets the value for the Multilevel Child Class' Member Variable
$user5->setStreamInfo("Twitch");

#Calls the overriden displayInfo() method
echo "<hr>";
echo "<strong>Child Class (UserStreamInfo): Hierarchical/Override (Parent: UserProfile)</strong><br>";
$user5->displayInfo($user5);
echo "<br>";

$user6 = new UserLevel("Support");

$user6->setIGN("Magnus");
$user6->setID(2021210389);
$user6->setServer(6006);

#Calls the overloaded printInfo() method
echo "<hr>";
echo "<strong>Child Class (UserLevel): Multilevel/Overload (Parent: UserStats)</strong><br>";
$user6->displayInfo($user6);
echo "<br>";
$user6->printInfo(30);
echo "<br>--------------------<br><br>";

$user7 = new UserLevel("Tank");

$user7->setIGN("Zx2K");
$user7->setID(2021220390);
$user7->setServer(7007);

$user7->displayInfo($user7);
echo "<br>";
$user7->printInfo(60);
echo "<br>";