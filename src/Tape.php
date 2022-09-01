<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/tape
class Tape
{
  /**
    * Read medialist
    * GET /api2/json/tape/media/list
  */
  public function MediaList()
  {
      return Request::Request("/tape/media/list?update-status=false");
  }

  /**
    * Set media status
    * GET /api2/json/tape/media/list/{mediaid}/status
    * @param string   $poolid
  */
  public function MediaStatus($media, $status)
  {
  		$data = [ 'status' => $status ];
  		
      return Request::Request("/tape/media/list/$media/status", $data, 'POST');
  }

  /**
    * Read drivelist
    * GET /api2/json/tape/drive
  */
  public function DriveList()
  {
      return Request::Request("/tape/drive");
  }

  /**
    * Label media in drive
    * GET /api2/json/tape/drive/{drive}/label-media
    * @param string   $poolid
  */
  public function MediaLabel($drive, $label, $pool)
  {
  		$data = [
  			'drive' 			=> $drive,
  			'label-text' 	=> $label,
  			'pool' 				=> $pool
  		];
  		
      return Request::Request("/tape/drive/$drive/label-media", $data, 'POST');
  }
  
}
