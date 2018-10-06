<?php
/*-------------------------------------------------------+
| Project 60 - CiviBanking                               |
| Copyright (C) 2013-2018 SYSTOPIA                       |
| Author: B. Endres (endres -at- systopia.de)            |
| http://www.systopia.de/                                |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL v3 license. You can redistribute it and/or  |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 *
 * Generated from xml/schema/CRM/Banking/BankTransaction.xml
 * DO NOT EDIT.  Generated by GenCode.php
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Banking_DAO_BankTransaction extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   * @static
   */
  static $_tableName = 'civicrm_bank_tx';
  /**
   * static instance to hold the field values
   *
   * @var array
   * @static
   */
  static $_fields = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   * @static
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   * @static
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   * @static
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   * @static
   */
  static $_log = true;
  /**
   * ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * The unique reference for this transaction
   *
   * @var string
   */
  public $bank_reference;
  /**
   * Value date for this bank transaction
   *
   * @var datetime
   */
  public $value_date;
  /**
   * Booking date for this bank transaction
   *
   * @var datetime
   */
  public $booking_date;
  /**
   * Transaction amount (positive or negative)
   *
   * @var float
   */
  public $amount;
  /**
   * Currency for the amount of the transaction
   *
   * @var string
   */
  public $currency;
  /**
   * Link to an option list
   *
   * @var int unsigned
   */
  public $type_id;
  /**
   * Link to an option list
   *
   * @var int unsigned
   */
  public $status_id;
  /**
   * The complete information received for this transaction
   *
   * @var text
   */
  public $data_raw;
  /**
   * A JSON-formatted array containing decoded fields
   *
   * @var text
   */
  public $data_parsed;
  /**
   * FK to bank_account of target account
   *
   * @var int unsigned
   */
  public $ba_id;
  /**
   * FK to bank_account of party account
   *
   * @var int unsigned
   */
  public $party_ba_id;
  /**
   * FK to parent bank_tx_batch
   *
   * @var int unsigned
   */
  public $tx_batch_id;
  /**
   * Numbering local to the tx_batch_id
   *
   * @var int unsigned
   */
  public $sequence;
  /**
   * A JSON-formatted array containing suggestions
   *
   * @var text
   */
  public $suggestions;
  /**
   * class constructor
   *
   * @access public
   * @return civicrm_bank_tx
   */
  function __construct()
  {
    $this->__table = 'civicrm_bank_tx';
    parent::__construct();
  }
  /**
   * return foreign keys and entity references
   *
   * @static
   * @access public
   * @return array of CRM_Core_EntityReference
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = array(
        new CRM_Core_EntityReference(self::getTableName() , 'ba_id', 'civicrm_bank_account', 'id') ,
        new CRM_Core_EntityReference(self::getTableName() , 'party_ba_id', 'civicrm_bank_account', 'id') ,
        new CRM_Core_EntityReference(self::getTableName() , 'tx_batch_id', 'civicrm_bank_tx_batch', 'id') ,
      );
    }
    return self::$_links;
  }
  /**
   * returns all the column names of this table
   *
   * @access public
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => true,
          'export' => true,
          'where' => 'civicrm_bank_tx.id',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'bank_reference' => array(
          'name' => 'bank_reference',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Unique Statement Reference', array('domain' => 'org.project60.banking')),
          'required' => true,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'export' => true,
          'where' => 'civicrm_bank_tx.bank_reference',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'value_date' => array(
          'name' => 'value_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Value date') ,
            //'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'required' => true,
        ) ,
        'booking_date' => array(
          'name' => 'booking_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
            //'dataPattern' => '/^\d{4}-?\d{2}-?\d{2} ?(\d{2}:?\d{2}:?(\d{2})?)?$/',
          'title' => ts('Booking date', array('domain' => 'org.project60.banking')),
          'required' => true,
        ) ,
        'amount' => array(
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Transaction amount', array('domain' => 'org.project60.banking')),
          'required' => true,
        ) ,
        'currency' => array(
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Currency') ,
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
        ) ,
        'type_id' => array(
          'name' => 'type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Bank Transaction Type', array('domain' => 'org.project60.banking')),
          'required' => true,
        ) ,
        'status_id' => array(
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Bank Transaction Status', array('domain' => 'org.project60.banking')),
          'required' => true,
        ) ,
        'data_raw' => array(
          'name' => 'data_raw',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Data Raw', array('domain' => 'org.project60.banking')),
        ) ,
        'data_parsed' => array(
          'name' => 'data_parsed',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Data Parsed', array('domain' => 'org.project60.banking')),
        ) ,
        'ba_id' => array(
          'name' => 'ba_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Bank Account ID', array('domain' => 'org.project60.banking')),
          'FKClassName' => 'CRM_Banking_DAO_BankAccount',
        ) ,
        'party_ba_id' => array(
          'name' => 'party_ba_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Party Bank Account ID', array('domain' => 'org.project60.banking')),
          'FKClassName' => 'CRM_Banking_DAO_BankAccount',
        ) ,
        'tx_batch_id' => array(
          'name' => 'tx_batch_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Bank Transaction Batch ID', array('domain' => 'org.project60.banking')),
          'FKClassName' => 'CRM_Banking_DAO_BankTransactionBatch',
        ) ,
        'sequence' => array(
          'name' => 'sequence',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Sequence in statement', array('domain' => 'org.project60.banking')),
        ) ,
        'suggestions' => array(
          'name' => 'suggestions',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Suggestions', array('domain' => 'org.project60.banking')),
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * returns the names of this table
   *
   * @access public
   * @static
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * returns if this table needs to be logged
   *
   * @access public
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * returns the list of fields that can be imported
   *
   * @access public
   * return array
   * @static
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['bank_tx'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * returns the list of fields that can be exported
   *
   * @access public
   * return array
   * @static
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['bank_tx'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
