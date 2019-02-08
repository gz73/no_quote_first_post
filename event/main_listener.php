<?php
/**
 *
 * Tojag no quote first post. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, tojag
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace tojag\nqfp\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Tojag no quote first post Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			'core.viewtopic_modify_post_row'	=> 'viewtopic_modify_post_row',
		);
	}

	/**
	 * No quote, if a post is the first post in a topic.
	 */
	public function viewtopic_modify_post_row($event)
	{
		$row = $event['row'];
		$topic_data = $event['topic_data'];
		$post_row = $event['post_row'];
		if ($row['post_id'] == $topic_data['topic_first_post_id'])
		{
			$post_row['U_QUOTE'] = '';
		}
		$event['post_row'] = $post_row;
	}
}
