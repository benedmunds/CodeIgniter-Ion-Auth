Here are how I configured CodeIgniter 2.1.2 to have working with Oracle
Server having driver 10g with instant client and a TNSNames file installed

<config/database.php>
	$db['default'] = array (
		'hostname' => '',	/* TNSNAMES REFERENCE*/
		'username' => '',
		'password' => '',
		'dbdriver' => 'oci8',
		'active_r' => TRUE,
		'pconnect' => TRUE,
		'db_debug' => TRUE,
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci'
	);
</database.php>

<config/autoload.php>
	$autoload['libraries'] = array('session','email','ion_auth','form_validation');
	$autoload['helper'] = array('url','form');
</autoload.php>

<config/config.php>
	$config['encryption_key'] = ' Generate with http://goo.gl/ky7A4 ';
	$config['sess_use_database']	= TRUE;
	$config['sess_table_name']		= 'CI_SESSIONS';
</config.php>

<config/ion_auth.php>
	$config['tables']['users']           = 'users';
	$config['tables']['groups']          = 'groups';
	$config['tables']['users_groups']    = 'users_groups';
	$config['tables']['login_attempts']  = 'login_attempts';
</ion_auth.php>

<CI_SESSIONS.sql>
-- Create table
create table CI_SESSIONS
(
  session_id     varchar2(40) default 0 not null,
  ip_address     varchar2(16) default 0 not null,
  user_agent     varchar2(150) default 0 not null,
  last_activity  number default 0 not null,
  user_data      varchar2(4000) default ''
)
-- ************************************************** FIX THIS ***********
tablespace <Your Table Namespace>
-- ************************************************** FIX THIS ***********
  storage
  (
	initial 64K
	minextents 1
	maxextents unlimited
  );
-- Add comments to the columns 
comment on column CI_SESSIONS.session_id
  is 'CodeIgniter framework session manager';
comment on column CI_SESSIONS.ip_address
  is 'Visitor''s IP address';
comment on column CI_SESSIONS.user_agent
  is 'Visitor''s browser properties';
comment on column CI_SESSIONS.last_activity
  is 'Unix timestamp';
comment on column CI_SESSIONS.user_data
  is 'Custom parameters';
-- Create/Recreate primary, unique and foreign key constraints 
alter table CI_SESSIONS
  add constraint PK_PRIMARY_KEY primary key (session_id);
-- Create/Recreate indexes 
create index last_activity_idx on CI_SESSIONS (last_activity);
</CI_SESSIONS.sql>
