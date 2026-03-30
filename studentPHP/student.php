<?php
	class Student
		{
		private $fName ="", $lName="", $SID=0,$classes= array();

function __construct($f, $l, $s, $c)
	{
	$this -> setfName($f);
	$this -> setlName($l);
	$this -> setSID($s);
	$this -> setClasses($c);
	} //ends constructor

	function setfName($f)
		{
		$this->fName = $f;
		}
	function setlName($l)
                {
                $this->lName = $l;
                }
        function setSID($s)
                {
                $this->SID = $s;
                }
        function setClasses($c)
                {
                $this->classes = $c;
                }


	function getfName()
	{
	return $this->fName;
	}
        function getlName()
        {
        return $this->lName;
        }
        function getSID()
        {
        return $this->SID;
        }
        function getClasses()
        {
        return $this->classes;
        }




		} //end vehicle class

?>
