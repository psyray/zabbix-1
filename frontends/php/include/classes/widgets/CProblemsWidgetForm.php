<?php
/*
** Zabbix
** Copyright (C) 2001-2017 Zabbix SIA
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


/**
 * Latest problems widget form
 */
class CProblemsWidgetForm extends CWidgetForm
{
	public function __construct($data)
	{
		parent::__construct($data);

		$field_lines = (new CWidgetFieldNumericBox('show_lines', _('Show lines'), 25, 1, 100))
			->setRequired(true);
		if (array_key_exists('show_lines', $data)) {
			$field_lines->setValue($data['show_lines']);
		}
		$this->fields[] = $field_lines;
	}
}
