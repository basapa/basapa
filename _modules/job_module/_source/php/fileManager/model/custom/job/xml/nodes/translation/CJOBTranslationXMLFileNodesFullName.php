<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBTranslationXMLFileNodesFullName extends CCTranslationXMLFileNodesFullName
{
	//PAGES...
	public const i_CONTENT_PAGE_NODE_FULL_NAME					= self::i_PAGES_NODE_FULL_NAME. '/content_page';
	public const i_CONTENTS_PAGE_NODE_FULL_NAME					= self::i_PAGES_NODE_FULL_NAME. '/contents_page';
	//...PAGES

	//FORMS...
	public const i_JOB_CONTENT_ADDITION_FORM_NODE_FULL_NAME	= self::i_FORMS_NODE_FULL_NAME. '/content_addition_form';
	//...FORMS

	//INFOS...
	public const i_JOB_CONTENT_PREVIEW_INFO_NODE_FULL_NAME				= self::i_INFOS_NODE_FULL_NAME. '/content_preview_info';
	public const i_JOB_CONTENT_INFO_NODE_FULL_NAME						= self::i_INFOS_NODE_FULL_NAME. '/content_info';
	public const i_CONTENT_GROUP_RANDOM_PREVIEW_INFO_NODE_FULL_NAME			= self::i_INFOS_NODE_FULL_NAME. '/content_group_random_preview_info';
	public const i_CONTENT_GROUP_PREVIEW_BY_CATEGORY_INFO_NODE_FULL_NAME	= self::i_INFOS_NODE_FULL_NAME. '/content_group_preview_by_category_info';
	//...INFOS

	//const ACCESS_RESTRICTION_MESSAGE_NODE_FULL_NAME		= 'translation/infos/messages/access_restriction_message';
	//const ACCESS_REQUIREMENT_MESSAGE_NODE_FULL_NAME		= 'translation/infos/messages/access_requirement_message';
	//const ACCESS_ERROR_MESSAGE_NODE_FULL_NAME			= 'translation/infos/messages/access_error_message';
	//const ACCESS_PROHIBITION_MESSAGE_NODE_FULL_NAME		= 'translation/infos/messages/access_prohibition_message';
	//const ERROR_403_MESSAGE_NODE_FULL_NAME				= 'translation/infos/messages/error_403_message';
	//const ERROR_404_MESSAGE_NODE_FULL_NAME				= 'translation/infos/messages/error_404_message';
}


?>