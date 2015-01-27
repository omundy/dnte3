<?php


// a list of all fbapi tokens, permissions, descriptions
$fb_data = array(
	'accounts' 		=> array('name' => 	'accounts',
							 'call' => 	'/me/accounts',
							 'scope' => 'manage_pages',
							 'desc' => 	'The Facebook pages of which the current user is an admin.',
							 'approval' => true),

	'achievements' 	=> array('name' => 	'achievements',
							 'call' => 	'/me/achievements',
							 'scope' => 'user_games_activity',
							 'desc' => 	'The games achievements that the user has received.',
							 'approval' => true),

	'activities' 	=> array('name' => 	'activities',
							 'call' => 	'/me/activities',
							 'scope' => 'user_activities',
							 'desc' => 	'The activities listed on someone\'s profile under Likes Activities.',
							 'approval' => true),

	'albums' 		=> array('name' => 	'albums',
							 'call' => 	'/me/albums',
							 'scope' => 'user_photos',
							 'desc' => 	'The photo albums this person has created.',
							 'approval' => true),

	'app_developer' => array('name' => 'app_developer',
							 'call' => 	'/me/applications/developer',
							 'scope' => 'granted',
							 'desc' => 	'The Facebook apps that this person is a developer of.'),

	'apprequests' 		=> array('name' => 'apprequests',
							 'call' => 	'/me/apprequests',
							 'scope' => 'granted',
							 'desc' => 	'The requests received by this person from the app making the API call.'),

	'books' 		=> array('name' => 	'books',
							 'call' => 	'/me/books',
							 'scope' => 'user_likes',
							 'desc' => 	"The liked books listed on someone's profile under Books > Likes.",
							 'approval' => true),

	// sortable by attending, created, maybe, not_replied, declined
	'events' 		=> array('name' => 	'events',
							 'call' => 	'/me/events',
							 'scope' => 'user_events',
							 'desc' => 	"The events this person is attending.",
							 'approval' => true),

	'family' 		=> array('name' => 	'family',
							 'call' => 	'/me/family',
							 'scope' => 'user_relationships',
							 'desc' => 	"This person's family relationships.",
							 'approval' => true),

	// includes links, posts, statuses, tagged
	'feed' 			=> array('name' => 	'feed',
							 'call' => 	'/me/feed',
							 'scope' => 'read_stream',
							 'desc' => 	"The feed of posts (including status updates) and links published by this person, or by others on this person's profile.",
							 'approval' => true),

	'friendlists' 	=> array('name' => 	'friendlists',
							 'call' => 	'/me/friendlists',
							 'scope' => 'manage_friendlists',
							 'desc' => 	"Groupings of friends such as 'Acquaintances' or 'Close Friends', or any others that may have been created.",
							 'approval' => true),

	'friends' 		=> array('name' => 	'friends',
							 'call' => 	'/me/friends',
							 'scope' => 'user_friends',
							 'desc' => 	"A person's friends."),


	'games' 		=> array('name' => 	'games',
							 'call' => 	'/me/games',
							 'scope' => 'user_likes',
							 'desc' => 	"The list of games someone has added to the Games > Likes section of their Facebook profile.",
							 'approval' => true),


	'groups' 		=> array('name' => 	'groups',
							 'call' => 	'/me/groups',
							 'scope' => 'user_groups',
							 'desc' => 	"The Facebook groups that a person is a member of.",
							 'approval' => true),


	'home' 			=> array('name' => 	'home',
							 'call' => 	'/me/home',
							 'scope' => 'read_stream',
							 'desc' => 	"The posts that a person sees in their Facebook News Feed.",
							 'approval' => true),


	'inbox' 		=> array('name' => 	'inbox',
							 'call' => 	'/me/inbox',
							 'scope' => 'read_mailbox',
							 'desc' => 	"A person's Facebook Messages inbox.",
							 'approval' => true),

	'interests' 	=> array('name' => 	'interests',
							 'call' => 	'/me/interests',
							 'scope' => 'user_interests',
							 'desc' => 	"The interests listed on someone's profile under Likes > Interests.",
							 'approval' => true),

	'likes' 		=> array('name' => 	'likes',
							 'call' => 	'/me/likes',
							 'scope' => 'user_likes',
							 'desc' => 	"The Facebook Pages that this person has 'liked'.",
							 'approval' => true),

	'me' 			=> array('name' => 	'me',
							 'call' => 	'/me',
							 'scope' => 'public_profile',
							 'desc' => 	"A user represents a person on Facebook. The /{user-id} node returns a single user."),

	'movies' 		=> array('name' => 	'movies',
							 'call' => 	'/me/movies',
							 'scope' => 'user_likes',
							 'desc' => 	"The liked movies listed on someone's profile under Movies > Likes.",
							 'approval' => true),

	'music' 		=> array('name' => 	'music',
							 'call' => 	'/me/music',
							 'scope' => 'user_likes',
							 'desc' => 	"The liked music artists listed on someone's profile under Music > Likes.",
							 'approval' => true),

	'notifications'	=> array('name' => 	'notifications',
							 'call' => 	'/me/notifications',
							 'scope' => 'manage_notifications',
							 'desc' => 	"The unread Facebook notifications that a person has.",
							 'approval' => true),

	'outbox' 		=> array('name' => 	'outbox',
							 'call' => 	'/me/outbox',
							 'scope' => 'read_mailbox',
							 'desc' => 	"A person's Facebook Messages outbox.",
							 'approval' => true),
	'permissions' 		=> array('name' => 	'permissions',
							 'call' => 	'/me/permissions',
							 'scope' => 'granted',
							 'desc' => 	"The permissions that the app has requested from the user, and whether they were granted or declined."),

	'photos' 		=> array('name' => 	'photos',
							 'call' => 	'/me/photos',
							 'scope' => 'user_photos',
							 'desc' => 	'All photos this person is tagged in.',
							 'approval' => true),
	'photos_uploaded' => array('name' => 	'photos_uploaded',
							 'call' => 	'/me/photos/uploaded ',
							 'scope' => 'user_photos',
							 'desc' => 	'All photos that were published to Facebook by this person.',
							 'approval' => true),

	'picture' 		=> array('name' => 	'picture',
							 'call' => 	'/me/picture',
							 'scope' => 'granted',
							 'desc' => 	"This person's profile picture."),

	'pokes' 		=> array('name' => 	'pokes',
							 'call' => 	'/me/pokes',
							 'scope' => 'read_mailbox',
							 'desc' => 	"The Facebook Pokes that a person has received and hasn't responded to.",
							 'approval' => true),

	'scores' 		=> array('name' => 	'scores',
							 'call' => 	'/me/scores',
							 'scope' => 'user_games_activity',
							 'desc' => 	"The scores this person has received from Facebook Games that they've played.",
							 'approval' => true),

// must be reviewed by Facebook
	'taggable_friends' => array('name' => 'taggable_friends',
							 'call' => 	'/me/taggable_friends',
							 'scope' => 'user_friends',
							 'desc' => 	"A list of friends that can be tagged or mentioned in stories published to Facebook.",
							 'approval' => true),

	'tagged_places'	=> array('name' => 	'tagged_places',
							 'call' => 	'/me/tagged_places',
							 'scope' => 'user_tagged_places',
							 'desc' => 	"A list of tags of this person at a place in a photo, video, post, status or link.",
							 'approval' => true),

	'television' 		=> array('name' => 	'television',
							 'call' => 	'/me/television',
							 'scope' => 'user_likes',
							 'desc' => 	"The liked TV shows listed on someone's profile under TV Shows > Likes.",
							 'approval' => true),

	'videos' 		=> array('name' => 	'videos',
							 'call' => 	'/me/videos',
							 'scope' => 'user_videos',
							 'desc' => 	"All videos this person is tagged in.",
							 'approval' => true),

	'videos_uploaded' => array('name' => 'videos_uploaded',
							 'call' => 	'/me/videos/uploaded',
							 'scope' => 'user_videos',
							 'desc' => 	"All videos that were published to Facebook by this person.",
							 'approval' => true),


);


?>