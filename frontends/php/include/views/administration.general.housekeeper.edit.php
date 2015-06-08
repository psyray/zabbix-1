<?php
/*
** Zabbix
** Copyright (C) 2001-2015 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/


require_once dirname(__FILE__).'/js/administration.general.housekeeper.edit.js.php';

$houseKeeperTab = new CFormList();

// events and alerts
$eventAlertTab = (new CTable())->addClass('formElementTable');
$eventsMode = (new CCheckBox('hk_events_mode'))->setChecked($data['hk_events_mode'] == 1);
$eventAlertTab->addRow([
	new CLabel(_('Enable internal housekeeping'), 'hk_events_mode'),
	$eventsMode
]);

$houseKeeperEventsTrigger = new CNumericBox('hk_events_trigger', $data['hk_events_trigger'], 5);
$houseKeeperEventsInternal = new CNumericBox('hk_events_internal', $data['hk_events_internal'], 5);
$houseKeeperEventsDiscovery = new CNumericBox('hk_events_discovery', $data['hk_events_discovery'], 5);
$houseKeeperEventsAutoreg = new CNumericBox('hk_events_autoreg', $data['hk_events_autoreg'], 5);
$houseKeeperEventsTrigger->setEnabled($data['hk_events_mode'] == 1);
$houseKeeperEventsInternal->setEnabled($data['hk_events_mode'] == 1);
$houseKeeperEventsDiscovery->setEnabled($data['hk_events_mode'] == 1);
$houseKeeperEventsAutoreg->setEnabled($data['hk_events_mode'] == 1);
$eventAlertTab->addRow([
	new CLabel(_('Trigger data storage period (in days)'), 'hk_events_trigger'),
	$houseKeeperEventsTrigger
]);
$eventAlertTab->addRow([
	new CLabel(_('Internal data storage period (in days)'), 'hk_events_internal'),
	$houseKeeperEventsInternal
]);
$eventAlertTab->addRow([
	new CLabel(_('Network discovery data storage period (in days)'), 'hk_events_discovery'),
	$houseKeeperEventsDiscovery
]);
$eventAlertTab->addRow([
	new CLabel(_('Auto-registration data storage period (in days)'), 'hk_events_autoreg'),
	$houseKeeperEventsAutoreg
]);
$eventAlertTab->addClass('border_dotted objectgroup element-row element-row-first');
$houseKeeperTab->addRow(_('Events and alerts'), new CDiv($eventAlertTab));

// IT services
$itServicesTab = (new CTable())->addClass('formElementTable');

$itServicesTab->addRow([
	new CLabel(_('Enable internal housekeeping'), 'hk_services_mode'),
	(new CCheckBox('hk_services_mode'))->setChecked($data['hk_services_mode'] == 1)
]);

$houseKeeperServicesMode = new CNumericBox('hk_services', $data['hk_services'], 5);
$houseKeeperServicesMode->setEnabled($data['hk_services_mode'] == 1);
$itServicesTab->addRow([
	new CLabel(_('Data storage period (in days)'), 'hk_services'),
	$houseKeeperServicesMode
]);
$itServicesTab->addClass('border_dotted objectgroup element-row');
$houseKeeperTab->addRow(_('IT services'), new CDiv($itServicesTab));

// audit
$auditTab = (new CTable())->addClass('formElementTable');

$auditTab->addRow([
	new CLabel(_('Enable internal housekeeping'), 'hk_audit_mode'),
	(new CCheckBox('hk_audit_mode'))->setChecked($data['hk_audit_mode'] == 1)
]);

$houseKeeperAuditMode = new CNumericBox('hk_audit', $data['hk_audit'], 5);
$houseKeeperAuditMode->setEnabled($data['hk_audit_mode'] == 1);
$auditTab->addRow([
	new CLabel(_('Data storage period (in days)'), 'hk_audit'),
	$houseKeeperAuditMode
]);
$auditTab->addClass('border_dotted objectgroup element-row');
$houseKeeperTab->addRow(_('Audit'), new CDiv($auditTab));

// user session
$userSessionTab = (new CTable())->addClass('formElementTable');

$userSessionTab->addRow([
	new CLabel(_('Enable internal housekeeping'), 'hk_sessions_mode'),
	(new CCheckBox('hk_sessions_mode'))->setChecked($data['hk_sessions_mode'] == 1)
]);

$houseKeeperSessionsMode = new CNumericBox('hk_sessions', $data['hk_sessions'], 5);
$houseKeeperSessionsMode->setEnabled($data['hk_sessions_mode'] == 1);
$userSessionTab->addRow([
	new CLabel(_('Data storage period (in days)'), 'hk_sessions'),
	$houseKeeperSessionsMode
]);
$userSessionTab->addClass('border_dotted objectgroup element-row');
$houseKeeperTab->addRow(_('User sessions'), new CDiv($userSessionTab));

// history
$histortTab = (new CTable())->addClass('formElementTable');

$histortTab->addRow([
	new CLabel(_('Enable internal housekeeping'), 'hk_history_mode'),
	(new CCheckBox('hk_history_mode'))->setChecked($data['hk_history_mode'] == 1)
]);
$houseKeeperHistoryGlobal = (new CCheckBox('hk_history_global'))->setChecked($data['hk_history_global'] == 1);
$houseKeeperHistoryModeGlobal = new CNumericBox('hk_history', $data['hk_history'], 5);
$houseKeeperHistoryModeGlobal->setEnabled($data['hk_history_global'] == 1);
$histortTab->addRow([new CLabel(_('Override item history period'),
	'hk_history_global'), $houseKeeperHistoryGlobal]);
$histortTab->addRow([
	new CLabel(_('Data storage period (in days)'), 'hk_history'),
	$houseKeeperHistoryModeGlobal
]);
$histortTab->addClass('border_dotted objectgroup element-row');
$houseKeeperTab->addRow(_('History'), new CDiv($histortTab));

// trend
$trendTab = (new CTable())->addClass('formElementTable');

$trendTab->addRow([
	new CLabel(_('Enable internal housekeeping'), 'hk_trends_mode'),
	(new CCheckBox('hk_trends_mode'))->setChecked($data['hk_trends_mode'] == 1)
]);
$houseKeeperTrendGlobal = (new CCheckBox('hk_trends_global'))->setChecked($data['hk_trends_global'] == 1);
$houseKeeperTrendModeGlobal = new CNumericBox('hk_trends', $data['hk_trends'], 5);
$houseKeeperTrendModeGlobal->setEnabled($data['hk_trends_global'] == 1);
$trendTab->addRow([new CLabel(_('Override item trend period'),
	'hk_trends_global'), $houseKeeperTrendGlobal]);
$trendTab->addRow([
	new CLabel(_('Data storage period (in days)'), 'hk_trends'),
	$houseKeeperTrendModeGlobal
]);
$trendTab->addClass('border_dotted objectgroup element-row');
$houseKeeperTab->addRow(_('Trends'), new CDiv($trendTab));

$houseKeeperView = new CTabView();
$houseKeeperView->addTab('houseKeeper', _('Housekeeping'), $houseKeeperTab);

$houseKeeperForm = new CForm();
$houseKeeperForm->setName('houseKeeperForm');
$houseKeeperView->setFooter(makeFormFooter(
	new CSubmit('update', _('Update')),
	[new CButton('resetDefaults', _('Reset defaults'))]
));

$houseKeeperForm->addItem($houseKeeperView);

return $houseKeeperForm;
