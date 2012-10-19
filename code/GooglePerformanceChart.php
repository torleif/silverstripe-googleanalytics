<?php

class GooglePerformanceChart extends Compositefield {

	protected $page;

	function __construct($page = null) {
		parent::__construct();
                Requirements::css($this->getCurrentFolder().'/css/GooglePerformanceChart.css');
                Requirements::javascript('sapphire/thirdparty/jquery-livequery/jquery.livequery.js');
                Requirements::javascript($this->getCurrentFolder().'/thirdparty/excanvas/excanvas.js');
                Requirements::javascript($this->getCurrentFolder().'/thirdparty/jquery.flot/jquery.flot.js');
                Requirements::javascript($this->getCurrentFolder().'/thirdparty/jquery.flot/jquery.flot.selection.js');
                Requirements::javascript($this->getCurrentFolder().'/javascript/GooglePerformanceChart.js');
                
		switch(true) {
			case $page instanceof SiteTree: $this->page = $page; break;
			case is_numeric($page): $page = DataObject::get_by_id('SiteTree', (int)$page); break;
		}
	}

	function FieldHolder($properties = array()) {
		return $this->renderWith('GooglePerformanceChart');
	}
	
	function PageID() {
		if($this->page) return $this->page->ID;
	}
        
        function getCurrentFolder () {
            $relativeFolder = str_ireplace( Director::baseFolder(), '', dirname(__dir__));
            
            $relativeFolder = str_ireplace('\\','/',$relativeFolder);
            
            return ltrim($relativeFolder, '/');
        }
}