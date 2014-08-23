{{ Former::select('')
->options($blockZones, $selected)
->name('block_zone_id')
->label(Lang::get('blocks::module.block_zone')) }}<br/>
