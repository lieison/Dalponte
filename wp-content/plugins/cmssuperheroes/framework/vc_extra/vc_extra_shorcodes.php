<?php
foreach (glob(CSCORE_PLUGIN_DIR."framework/vc_extra/vc_extra_shortcodes/*.php") as $filename)
{
	include $filename;
}