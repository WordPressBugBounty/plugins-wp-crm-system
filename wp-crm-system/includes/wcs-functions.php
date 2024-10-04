<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'wpcrm_system_get_crm_nicename_by_id' ) ) {
	function wpcrm_system_get_crm_nicename_by_id( $id ) {
		$return = '';
		$user   = new WP_User( $id );
		if ( $user->has_cap( get_option( 'wpcrm_system_select_user_role' ) ) ) {
			$return = $user->data->user_nicename;
		}
		return $return;
	}
}

if ( ! function_exists( 'wpcrm_system_display_name_prefix' ) ) {
	function wpcrm_system_display_name_prefix( $prefix ) {
		$wpcrm_prefixes = array(
			''       => '',
			'mr'     => _x( 'Mr.', 'Title for male without a higher professional title.', 'wp-crm-system' ),
			'mrs'    => _x( 'Mrs.', 'Married woman or woman who has been married with no higher professional title.', 'wp-crm-system' ),
			'miss'   => _x( 'Miss', 'An unmarried woman. Also Ms.', 'wp-crm-system' ),
			'ms'     => _x( 'Ms.', 'An unmarried woman. Also Miss.', 'wp-crm-system' ),
			'dr'     => _x( 'Dr.', 'Doctor', 'wp-crm-system' ),
			'master' => _x( 'Master', 'Title used for young men.', 'wp-crm-system' ),
			'coach'  => _x( 'Coach', 'Title used for the person in charge of a sports team', 'wp-crm-system' ),
			'rev'    => _x( 'Rev.', 'Title of a priest or religious clergy - Reverend ', 'wp-crm-system' ),
			'fr'     => _x( 'Fr.', 'Title of a priest or religious clergy - Father', 'wp-crm-system' ),
			'atty'   => _x( 'Atty.', 'Attorney, or lawyer', 'wp-crm-system' ),
			'prof'   => _x( 'Prof.', 'Professor, as in a teacher at a university.', 'wp-crm-system' ),
			'hon'    => _x( 'Hon.', 'Honorable - often used for elected officials or judges.', 'wp-crm-system' ),
			'pres'   => _x( 'Pres.', 'Term given to the head of an organization or country. As in President of a University or President of the United States', 'wp-crm-system' ),
			'gov'    => _x( 'Gov.', 'Governor, as in the Governor of the State of New York.', 'wp-crm-system' ),
			'ofc'    => _x( 'Ofc.', 'Officer as in a police officer.', 'wp-crm-system' ),
			'supt'   => _x( 'Supt.', 'Superintendent', 'wp-crm-system' ),
			'rep'    => _x( 'Rep.', 'Representative - as in an elected official to the House of Representatives', 'wp-crm-system' ),
			'sen'    => _x( 'Sen.', 'An elected official - Senator.', 'wp-crm-system' ),
			'amb'    => _x( 'Amb.', 'Ambassador - a diplomatic official.', 'wp-crm-system' ),
		);
		if ( has_filter( 'wpcrmsystem_name_prefix' ) ) {
			$wpcrm_prefixes = apply_filters( 'wpcrmsystem_name_prefix', $wpcrm_prefixes );
		}
		if ( array_key_exists( $prefix, $wpcrm_prefixes ) ) {
			return $wpcrm_prefixes[ $prefix ];
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_currency_symbol' ) ) {
	function wpcrm_system_display_currency_symbol( $currency ) {
		$wpcrm_currencies = array(
			'aed' => 'AED',
			'afn' => '&#1547;',
			'all' => '&#76;&#101;&#107;',
			'amd' => 'AMD',
			'ang' => '&#402;',
			'aoa' => 'AOA',
			'ars' => '&#36;',
			'aud' => '&#36;',
			'awg' => '&#402;',
			'azn' => '&#1084;&#1072;&#1085;',
			'bam' => '&#75;&#77;',
			'bbd' => '&#36;',
			'bdt' => 'BDT',
			'bgn' => '&#1083;&#1074;',
			'bhd' => 'BHD',
			'bif' => 'BIF',
			'bmd' => '&#36;',
			'bnd' => '&#36;',
			'bob' => '&#36;&#98;',
			'brl' => '&#82;&#36;',
			'bsd' => '&#36;',
			'btn' => 'BTN',
			'bwp' => '&#80;',
			'byr' => '&#112;&#46;',
			'bzd' => '&#66;&#90;&#36;',
			'cad' => '&#36;',
			'cdf' => 'CDF',
			'chf' => '&#67;&#72;&#70;',
			'clp' => '&#36;',
			'cny' => '&#165;',
			'cop' => '&#36;',
			'crc' => '&#8353;',
			'cuc' => 'CUC',
			'cup' => '&#8369;',
			'cve' => 'CVE',
			'czk' => '&#75;&#269;',
			'djf' => 'DJF',
			'dkk' => '&#107;&#114;',
			'dop' => '&#82;&#68;&#36;',
			'dzd' => 'DZD',
			'egp' => '&#163;',
			'ern' => 'ERN',
			'etb' => 'ETB',
			'eur' => '&#8364;',
			'fjd' => '&#36;',
			'fkp' => '&#163;',
			'gbp' => '&#163;',
			'gel' => 'GEL',
			'ggp' => '&#163;',
			'ghs' => '&#162;',
			'gip' => '&#163;',
			'gmd' => 'GMD',
			'gnf' => 'GNF',
			'gtq' => '&#81;',
			'gyd' => '&#36;',
			'hkd' => '&#36;',
			'hnl' => '&#76;',
			'hrk' => '&#107;&#110;',
			'htg' => 'HTG',
			'huf' => '&#70;&#116;',
			'idr' => '&#82;&#112;',
			'ils' => '&#8362;',
			'imp' => '&#163;',
			'inr' => '&#8377;',
			'iqd' => 'IQD',
			'irr' => '&#65020;',
			'isk' => '&#107;&#114;',
			'jep' => '&#163;',
			'jmd' => '&#74;&#36;',
			'jod' => 'JOD',
			'jpy' => '&#165;',
			'kes' => 'KES',
			'kgs' => '&#1083;&#1074;',
			'khr' => '&#6107;',
			'kmf' => 'KMF',
			'kpw' => '&#8361;',
			'krw' => '&#8361;',
			'kwd' => 'KWD',
			'kyd' => '&#36;',
			'kzt' => '&#1083;&#1074;',
			'lak' => '&#8365;',
			'lbp' => '&#163;',
			'lkr' => '&#8360;',
			'lrd' => '&#36;',
			'lsl' => 'LSL',
			'lyd' => 'LYD',
			'mad' => 'MAD',
			'mdl' => 'MDL',
			'mga' => 'MGA',
			'mkd' => '&#1076;&#1077;&#1085;',
			'mmk' => 'MMK',
			'mnt' => '&#8366;',
			'mop' => 'MOP',
			'mro' => 'MRO',
			'mur' => '&#8360;',
			'mvr' => 'MVR',
			'mwk' => 'MWK',
			'mxn' => '&#36;',
			'myr' => '&#82;&#77;',
			'mzn' => '&#77;&#84;',
			'nad' => '&#36;',
			'ngn' => '&#8358;',
			'nio' => '&#67;&#36;',
			'nok' => '&#107;&#114;',
			'npr' => '&#8360;',
			'nzd' => '&#36;',
			'omr' => '&#65020;',
			'pab' => '&#66;&#47;&#46;',
			'pen' => '&#83;&#47;&#46;',
			'pgk' => 'PGK',
			'php' => '&#8369;',
			'pkr' => '&#8360;',
			'pln' => '&#122;&#322;',
			'prb' => 'PRB',
			'pyg' => '&#71;&#115;',
			'qar' => '&#65020;',
			'ron' => '&#108;&#101;&#105;',
			'rsd' => '&#1044;&#1080;&#1085;&#46;',
			'rub' => '&#1088;&#1091;&#1073;',
			'rwf' => 'RWF',
			'sar' => '&#65020;',
			'sbd' => '&#36;',
			'scr' => '&#8360;',
			'sdg' => 'SDG',
			'sek' => '&#107;&#114;',
			'sgd' => '&#36;',
			'shp' => '&#163;',
			'sll' => 'SLL',
			'sos' => '&#83;',
			'srd' => '&#36;',
			'ssp' => 'SSP',
			'std' => 'STD',
			'syp' => '&#163;',
			'szl' => 'SZL',
			'thb' => '&#3647;',
			'tjs' => 'TJS',
			'tmt' => 'TMT',
			'tnd' => 'TND',
			'top' => 'TOP',
			'try' => '&#8378;',
			'ttd' => '&#84;&#84;&#36;',
			'twd' => '&#78;&#84;&#36;',
			'tzs' => 'TZS',
			'uah' => '&#8372;',
			'ugx' => 'UGX',
			'usd' => '&#36;',
			'uyu' => '&#36;&#85;',
			'uzs' => '&#1083;&#1074;',
			'vef' => '&#66;&#115;',
			'vnd' => '&#8363;',
			'vuv' => 'VUV',
			'wst' => 'WST',
			'xaf' => 'XAF',
			'xcd' => '&#36;',
			'xof' => 'XOF',
			'xpf' => 'XPF',
			'yer' => '&#65020;',
			'zar' => '&#82;',
			'zmw' => 'ZMW',
		);
		if ( array_key_exists( $currency, $wpcrm_currencies ) ) {
			return $wpcrm_currencies[ $currency ];
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_status' ) ) {
	function wpcrm_system_display_status( $status ) {
		$wpcrm_status = array(
			'not-started' => _x( 'Not Started', 'Work has not yet begun.', 'wp-crm-system' ),
			'in-progress' => _x( 'In Progress', 'Work has begun but is not complete.', 'wp-crm-system' ),
			'complete'    => _x( 'Complete', 'All tasks are finished. No further work is needed.', 'wp-crm-system' ),
			'on-hold'     => _x( 'On Hold', 'Work may be in various stages of completion, but has been stopped for one reason or another.', 'wp-crm-system' ),
		);
		if ( array_key_exists( $status, $wpcrm_status ) ) {
			return $wpcrm_status[ $status ];
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_progress' ) ) {
	function wpcrm_system_display_progress( $progress ) {
		$wpcrm_progress = array(
			'zero' => 0,
			5      => 5,
			10     => 10,
			15     => 15,
			20     => 20,
			25     => 25,
			30     => 30,
			35     => 35,
			40     => 40,
			45     => 45,
			50     => 50,
			55     => 55,
			60     => 60,
			65     => 65,
			70     => 70,
			75     => 75,
			80     => 80,
			85     => 85,
			90     => 90,
			95     => 95,
			100    => 100,
		);
		if ( array_key_exists( $progress, $wpcrm_progress ) ) {
			return $wpcrm_progress[ $progress ] . '%';
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_status' ) ) {
	function wpcrm_system_display_status( $status ) {
		$wpcrm_status = array(
			'not-started' => _x( 'Not Started', 'Work has not yet begun.', 'wp-crm-system' ),
			'in-progress' => _x( 'In Progress', 'Work has begun but is not complete.', 'wp-crm-system' ),
			'complete'    => _x( 'Complete', 'All tasks are finished. No further work is needed.', 'wp-crm-system' ),
			'on-hold'     => _x( 'On Hold', 'Work may be in various stages of completion, but has been stopped for one reason or another.', 'wp-crm-system' ),
		);
		if ( array_key_exists( $status, $wpcrm_status ) ) {
			return $wpcrm_status[ $status ];
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_priority' ) ) {
	function wpcrm_system_display_priority( $priority ) {
		$wpcrm_priority = array(
			''       => __( 'Not Set', 'wp-crm-system' ),
			'low'    => _x( 'Low', 'Not of great importance', 'wp-crm-system' ),
			'medium' => _x( 'Medium', 'Average priority', 'wp-crm-system' ),
			'high'   => _x( 'High', 'Greatest importance', 'wp-crm-system' ),
		);
		if ( array_key_exists( $priority, $wpcrm_priority ) ) {
			return $wpcrm_priority[ $priority ];
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_wonlost' ) ) {
	function wpcrm_system_display_wonlost( $wonlost ) {
		$wpcrm_wonlost = array(
			'not-set'   => __( 'Not Set', 'wp-crm-system' ),
			'won'       => _x( 'Won', 'Successful, a winner.', 'wp-crm-system' ),
			'lost'      => _x( 'Lost', 'Unsuccessful, a loser.', 'wp-crm-system' ),
			'suspended' => _x( 'Suspended', 'Temporarily ended, but may resume again.', 'wp-crm-system' ),
			'abandoned' => _x( 'Abandoned', 'No longer actively working on.', 'wp-crm-system' ),
		);
		if ( array_key_exists( $wonlost, $wpcrm_wonlost ) ) {
			return $wpcrm_wonlost[ $wonlost ];
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'wpcrm_system_display_calendar' ) ) {
	function wpcrm_system_display_calendar( $types, $month, $year ) {
		if ( 'all' == $types ) {
			$post_types = array( 'wpcrm-campaign', 'wpcrm-opportunity', 'wpcrm-project', 'wpcrm-task' );
		} else {
			$post_types = array( $types );
		}
		if ( '1' == $month ) {
			$prev_month = '12';
			$prev_year  = $year - 1;
		} else {
			$prev_month = $month - 1;
			$prev_year  = $year;
		}
		if ( '12' == $month ) {
			$next_month = '1';
			$next_year  = $year + 1;
		} else {
			$next_month = $month + 1;
			$next_year  = $year;
		}
		$view_as_param = isset( $_GET['view-as-id'] ) ? '&view-as-id=' . sanitize_text_field( $_GET['view-as-id'] ) : '';

		/* draw table */
		$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

		/* table headings */
		$calendar .= '<thead>';
		$calendar .= '<tr class="calendar-row month">
			<td class="calendar-day-head calendar-nav calendar-nav-prev">
				<a title="' . __( 'Previous Month', 'wp-crm-system' ) . '" href="?page=wpcrm-settings&wpcrm-cal-month=' . absint( $prev_month ) . '&wpcrm-cal-year=' . $prev_year . $view_as_param . '">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg>
				</a>
			</td>
			<td class="calendar-day-head" colspan="5"><h3>' . date( 'F Y', mktime( 0, 0, 0, absint( $month ), 1, absint( $year ) ) ) . '</h3></td>
			<td class="calendar-day-head calendar-nav calendar-nav-next">
				<a title="' . __( 'Next Month', 'wp-crm-system' ) . '" href="?page=wpcrm-settings&wpcrm-cal-month=' . absint( $next_month ) . '&wpcrm-cal-year=' . absint( $next_year ) . $view_as_param . '">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg>
				</a>
			</td>
		</tr>';

		$headings  = array( __( 'Sunday', 'wp-crm-system' ), __( 'Monday', 'wp-crm-system' ), __( 'Tuesday', 'wp-crm-system' ), __( 'Wednesday', 'wp-crm-system' ), __( 'Thursday', 'wp-crm-system' ), __( 'Friday', 'wp-crm-system' ), __( 'Saturday', 'wp-crm-system' ) );
		$calendar .= '<tr class="calendar-row weekdays">';

		foreach ( $headings as $heading ) {
			$calendar         .= '<td class="calendar-day-head">';
				$calendar     .= '<span class="' . strtolower( $heading ) . '">';
					$calendar .= '<span class="first-letter">' . substr( $heading, 0, 1 ) . '</span>';
					$calendar .= '<span class="other-letters">' . substr( $heading, 1 ) . '</span>';
				$calendar     .= '</span>';
			$calendar         .= '</td>';
		}

		$calendar .= '</tr>';
		$calendar .= '</thead>';
		$calendar .= '<tbody>';

		/* days and weeks vars now ... */
		$running_day       = date( 'w', mktime( 0, 0, 0, $month, 1, $year ) );
		$days_in_month     = date( 't', mktime( 0, 0, 0, $month, 1, $year ) );
		$days_in_this_week = 1;
		$day_counter       = 0;
		$dates_array       = array();

		/* row for week one */
		$calendar .= '<tr class="calendar-row">';

		/* print "blank" days until the first of the current week */
		for ( $x = 0; $x < $running_day; $x++ ) :
			$calendar .= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		// checking if the device is mobile
		$is_mobile = wp_is_mobile();
		/* keep going with days.... */
		for ( $list_day = 1; $list_day <= $days_in_month; $list_day++ ) :
			$calendar .= '<td class="calendar-day">';
				/* add in the day number */
				$calendar .= '<div class="day-number-wrapper day-number-wrapper-' . $list_day . '" data-day="' . $list_day . '" data-month="' . $month . '" data-year="' . $year . '" data-fulldate="' . date( 'F d, Y', mktime( 0, 0, 0, absint( $month ), $list_day, absint( $year ) ) ) . '"><p class="day-number">' . $list_day . '</p><p class="quick-add"><a href="#" class="dashboard-quick-add day-number-' . $list_day . '" data-day="' . $list_day . '" data-month="' . $month . '" data-year="' . $year . '" data-fulldate="' . date( 'F d, Y', mktime( 0, 0, 0, absint( $month ), $list_day, absint( $year ) ) ) . '"><img src="' . WP_CRM_SYSTEM_URL . '/assets/dist/images/plus-33-256.png" width="16"></a></p></div>';

				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! */
				/**
				 * If we have view-as-id
				 *
				 * Then fetch ALL post types attached to them
				 */
				$view_as = isset( $_GET['view-as-id'] ) ? sanitize_text_field( $_GET['view-as-id'] ) : '';

				/**
				 * If we have wpcrm-cal-month in the address bar
				 *
				 * This means we are navigating from default month view
				 * Prioritise the get_option value in this case
				 */
			if ( ! $view_as ) {
				if ( 'default' === $view_as ) {
					update_option( 'view-as-id', false );
				} else {
					$view_as = get_option( 'view-as-id' );
				}
			}

			if ( $view_as && 'default' !== $view_as ) {
				$args = array(
					'post_type'  => $post_types,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'value' => strtotime( $month . '/' . $list_day . '/' . $year ),
						),
						array(
							'relation' => 'OR',
							array(
								'key'   => '_wpcrm_task-attach-to-contact',
								'value' => $view_as,
							),
							array(
								'key'   => '_wpcrm_campaign-attach-to-contact',
								'value' => $view_as,
							),
							array(
								'key'   => '_wpcrm_project-attach-to-contact',
								'value' => $view_as,
							),
						),
					),
				);
				update_option( 'view-as-id', $view_as );
			} else {
				update_option( 'view-as-id', false );
				$args = array(
					'post_type'  => $post_types,
					'meta_query' => array(
						array(
							'value' => strtotime( $month . '/' . $list_day . '/' . $year ),
						),
					),
				);
			}

				/**
				 * Filtering by author
				 *
				 * Simply add new param to the args if we need to filter
				 */
				$author = isset( $_GET['filter-author'] ) ? sanitize_text_field( $_GET['filter-author'] ) : '';
			if ( ! $author ) {
				if ( 'default' === $author ) {
					update_option( 'filter-author', false );
				} else {
					$author = get_option( 'filter-author' );
				}
			}
			if ( $author && 'default' !== $author ) {
				$args['author'] = $author;
				update_option( 'filter-author', $author );
			} else {
				update_option( 'filter-author', false );
			}

				$event_query = new WP_Query( $args );
				$is_events   = $event_query->have_posts();
				$is_hidden   = ( ! $is_events ) ? 'is-hidden' : '';
			if ( $is_mobile ) {
				// showing only icons
				$calendar .= '<ul class="calendar-icon-list">';
				if ( $is_events ) {
					while ( $event_query->have_posts() ) {
						$event_query->the_post();
						$this_type = get_post_type();
						switch ( $this_type ) {
							case 'wpcrm-campaign':
								$icon = '<span class="dashicons dashicons-megaphone wpcrm-dashicons"></span>';
								break;
							case 'wpcrm-opportunity':
								$icon = '<span class="dashicons dashicons-phone wpcrm-dashicons"></span>';
								break;
							case 'wpcrm-project':
								$icon = '<span class="dashicons dashicons-clipboard wpcrm-dashicons"></span>';
								break;
							case 'wpcrm-task':
								$icon = '<span class="dashicons dashicons-yes wpcrm-dashicons"></span>';
								break;
							default:
								$icon = '';
								break;
						}
						$line_item = '<li>' . $icon . '</li>';
						$calendar .= $line_item;

					} // end while
				} else {
					// end if
					$calendar .= str_repeat( '<li>&nbsp;</li>', 2 );
				}
				$calendar .= '</ul>';
				$calendar .= '<div class="popup-trigger js-open-popup ' . ( $is_hidden ) . '" data-content="' . $list_day . '"></div>';
				$calendar .= '<div class="popup-container" data-content="' . $list_day . '">';
				$calendar .= '<div class="popup-box">';
				$calendar .= '<div class="popup-header"><h3>Lists of events</h3></div>';
				$calendar .= '<ul class="popup-content">';
			} else {
				$calendar .= '<ul>';
			}

			if ( $is_events ) {
				while ( $event_query->have_posts() ) {
					$event_query->the_post();
					$this_type = get_post_type();
					switch ( $this_type ) {
						case 'wpcrm-campaign':
							$icon = '<span class="dashicons dashicons-megaphone wpcrm-dashicons"></span>';
							break;
						case 'wpcrm-opportunity':
							$icon = '<span class="dashicons dashicons-phone wpcrm-dashicons"></span>';
							break;
						case 'wpcrm-project':
							$icon = '<span class="dashicons dashicons-clipboard wpcrm-dashicons"></span>';
							break;
						case 'wpcrm-task':
							$icon = '<span class="dashicons dashicons-yes wpcrm-dashicons"></span>';
							break;
						default:
							$icon = '';
							break;
					}
					$line_item          = '<li>' . $icon . '<a href="' . get_edit_post_link() . '">' . get_the_title() . '</a></li>';
					$filtered_line_item = apply_filters( 'wpcrm_system_single_calendar_entry', $line_item, get_the_ID(), $icon );
					$calendar          .= $filtered_line_item;
				} // end while
			} else {
				// end if
				$calendar .= str_repeat( '<li>&nbsp;</li>', 2 );
			}
				$calendar .= '</ul>';

			if ( $is_mobile ) {
				$calendar .= '</div></div>'; // end popup-box popup-container;
			}

			if ( has_filter( 'wpcrm_system_add_calendar_entry' ) ) {
				// Let other plugins add entries to the calendar
				$calendar = apply_filters( 'wpcrm_system_add_calendar_entry', $calendar, $month, $list_day, $year );
			}
				wp_reset_postdata();

				$calendar .= '</td>';

			if ( $running_day == 6 ) {
				$calendar .= '</tr>';

				if ( ( $day_counter + 1 ) != $days_in_month ) {
					$calendar .= '<tr class="calendar-row">';
				}

				$running_day       = -1;
				$days_in_this_week = 0;
			}

				$days_in_this_week++;
				$running_day++;
				$day_counter++;
		endfor;

		/* finish the rest of the days in the week */
		if ( $days_in_this_week < 8 ) :
			for ( $x = 1; $x <= ( 8 - $days_in_this_week ); $x++ ) :
				$calendar .= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;

		/* final row */
		$calendar .= '</tr>';

		$calendar .= '</tbody>';

		/* end the table */
		$calendar .= '</table>';

		/* all done, return result */
		return $calendar;
	}
}

if ( ! function_exists( 'wpcrm_system_random_string' ) ) {
	function wpcrm_system_random_string() {
		$length           = apply_filters( 'wpcrm_system_random_string_length', 50 );
		$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen( $characters );
		$randomString     = '';
		for ( $i = 0; $i < $length; $i++ ) {
			$randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
		}
		return $randomString;
	}
}

if ( ! function_exists( 'wpcrm_system_gdpr_page' ) ) {
	function wpcrm_system_gdpr_page( $post_id, $secret ) {
		$gdpr_id = get_option( 'wpcrm_system_gdpr_page_id' );
		if ( ! $gdpr_id ) {
			$message = __( 'No GDPR Page has been set. Please visit WP-CRM System Dashboard Settings tab to set the GDPR page.', 'wp-crm-system' );
		} else {
			switch ( $secret ) {
				case '':
					$message = __( 'Please set a secret key above, then update this contact to get the GDPR URL.', 'wp-crm-system' );
					break;

				default:
					$url = add_query_arg(
						array(
							'contact_id' => $post_id,
							'secret'     => $secret,
						),
						esc_url( get_permalink( $gdpr_id ) )
					);

					$success = __( 'Copied the URL: ', 'wp-crm-system' );

					$message = '<script>
						function copyGDPRURL() {
							/* Get the text field */
							var copyText = document.getElementById("wpcrm_system_gdpr_url");

							/* Select the text field */
							copyText.select();

							/* Copy the text inside the text field */
							document.execCommand("Copy");

							/* Alert the copied text */
							alert("' . $success . '" + copyText.value);
						}
					</script>
					<br />
					<label for="wpcrm_system_gdpr_url">' . __( 'GDPR Compliance Link', 'wp-crm-system' ) . '</label>
					<input type="text" value="' . $url . '" id="wpcrm_system_gdpr_url" /><a class="button" onclick="copyGDPRURL()">' . __( 'Copy GDPR URL', 'wp-crm-system' ) . '</a>';
					break;
			}
		}
		return '<br />' . $message;
	}
}


function wpcrm_system_get_contact_ids_by_email_address( $email_address, $number = 500, $page = 1 ) {
	global $post;
	// On the first iteration we don't want to offset at all (500 * ( 1-1 ) = 0)
	// On the second iteration we want to offset by 500 ( 500 * ( 2-1 ) = 500)
	// And so on.
	$offset   = $number * ( $page - 1 );
	$ids      = false;
	$contacts = get_posts(
		array(
			'post_type'      => 'wpcrm-contact',
			'meta_key'       => '_wpcrm_contact-email',
			'meta_value'     => $email_address,
			'post_status'    => 'any',
			'posts_per_page' => $number,
			'offset'         => $offset,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);

	foreach ( $contacts as $contact ) {
		setup_postdata( $contact );
		$ids[] = $contact->ID;
	}

	return $ids;

}

function wpcrm_system_get_records_by_contact_email_address( $email_address, $record_type, $number = 500, $page = 1 ) {

	// On the first iteration ($page == 1) we don't want to offset at all (500 * ( 1-1 ) = 0)
	// On the second iteration ($page == 2) we want to offset by 500 ( 500 * ( 2-1 ) = 500)
	// And so on.
	$offset = $number * ( $page - 1 );

	switch ( $record_type ) {
		case 'campaign':
			$post_type = 'wpcrm-campaign';
			$meta_key  = '_wpcrm_campaign-attach-to-contact';
			break;

		case 'opportunity':
			$post_type = 'wpcrm-opportunity';
			$meta_key  = '_wpcrm_opportunity-attach-to-contact';
			break;

		case 'project':
			$post_type = 'wpcrm-project';
			$meta_key  = '_wpcrm_project-attach-to-contact';
			break;

		case 'task':
			$post_type = 'wpcrm-task';
			$meta_key  = '_wpcrm_task-attach-to-contact';
			break;

		case 'invoice':
			$post_type = 'wpcrm-invoice';
			$meta_key  = '_wpcrm_invoice-attach-to-contact';

		default:
			$post_type = '';
			$meta_key  = '';
			break;
	}

	$ids = wpcrm_system_get_contact_ids_by_email_address( $email_address );

	$return = array();

	if ( $ids ) {

		foreach ( (array) $ids as $id ) {

			global $post;

			$records = get_posts(
				array(
					'post_type'      => $post_type,
					'meta_key'       => $meta_key,
					'meta_value'     => $id,
					'post_status'    => 'any',
					'posts_per_page' => $number,
					'offset'         => $offset,
					'orderby'        => 'date',
					'order'          => 'DESC',
				)
			);

			foreach ( $records as $record ) {

				setup_postdata( $record );

				$return[] = $record->ID;

			}
		}
	}

	return (array) $return;

}

function wpcrm_system_get_records_by_contact_ids( $ids, $record_type, $number = 500, $page = 1 ) {

	// On the first iteration ($page == 1) we don't want to offset at all (500 * ( 1-1 ) = 0)
	// On the second iteration ($page == 2) we want to offset by 500 ( 500 * ( 2-1 ) = 500)
	// And so on.
	$offset = $number * ( $page - 1 );

	switch ( $record_type ) {
		case 'campaign':
			$post_type = 'wpcrm-campaign';
			$meta_key  = '_wpcrm_campaign-attach-to-contact';
			break;

		case 'opportunity':
			$post_type = 'wpcrm-opportunity';
			$meta_key  = '_wpcrm_opportunity-attach-to-contact';
			break;

		case 'project':
			$post_type = 'wpcrm-project';
			$meta_key  = '_wpcrm_project-attach-to-contact';
			break;

		case 'task':
			$post_type = 'wpcrm-task';
			$meta_key  = '_wpcrm_task-attach-to-contact';
			break;

		case 'invoice':
			$post_type = 'wpcrm-invoice';
			$meta_key  = '_wpcrm_invoice-attach-to-contact';

		default:
			$post_type = '';
			$meta_key  = '';
			break;
	}

	$return = array();

	if ( $ids ) {

		foreach ( (array) $ids as $id ) {

			global $post;

			$records = get_posts(
				array(
					'post_type'      => $post_type,
					'meta_key'       => $meta_key,
					'meta_value'     => $id,
					'post_status'    => 'any',
					'posts_per_page' => $number,
					'offset'         => $offset,
					'orderby'        => 'date',
					'order'          => 'DESC',
				)
			);

			foreach ( $records as $record ) {

				setup_postdata( $record );

				$return[] = $record->ID;

			}
		}
	}

	return (array) $return;

}

function wpcrm_system_get_required_user_role() {
	if ( 'set' == get_option( 'wpcrm_system_settings_initial' ) ) {
		$page_role = WPCRM_USER_ACCESS;
	} else {
		$page_role = 'manage_options';
	}
	return $page_role;
}

function wp_crm_system_get_post_type_list( $id = false, $post_type = false, $field_name = 'wp_crm_system_entry_ids' ) {
	if ( ! $post_type ) {
		return;
	}

	$args                   = array();
	$args['post_type']      = $post_type;
	$args['order']          = 'ASC';
	$args['orderby']        = array( 'type', 'title' );
	$args['post_status']    = apply_filters( 'wp_crm_system_get_post_type_list_status', 'publish' );
	$args['posts_per_page'] = apply_filters( 'wp_crm_system_get_post_type_list_posts_per_page', -1 );
	$posts                  = new WP_QUERY( $args );

	ob_start();
	?>
	<select class="wp-crm-system-searchable" name="<?php echo $field_name; ?>">
		<?php
		if ( $posts->have_posts() ) {
			?>
			<option value=""><?php _e( 'Select an entry', 'wp-crm-system' ); ?></option>
			<?php
		}
		while ( $posts->have_posts() ) :
			$posts->the_post();
			switch ( get_post_type( get_the_ID() ) ) {
				case 'wpcrm-project':
					$type = ' (' . __( 'Project', 'wp-crm-system' ) . ')';
					break;
				case 'wpcrm-task':
					$type = ' (' . __( 'Task', 'wp-crm-system' ) . ')';
					break;

				default:
					$type = '';
					break;
			}
			?>

		<option value="<?php echo get_the_ID(); ?>" <?php selected( get_the_ID(), $id ); ?>>
								  <?php
									the_title();
									echo $type;
									?>
		</option>

			<?php

		endwhile;
		?>
	</select>
	<?php
	return ob_get_clean();
}

function wp_crm_system_process_datetime( $date ) {
	$timestamp = strtotime( $date );
	$output    = date( 'Y-m-d H:i:s', $timestamp );
	return $output;
}

function wp_crm_system_return_bytes( $val ) {
	$val   = trim( $val );
	$last  = strtolower( $val[ strlen( $val ) - 1 ] );
	$bytes = preg_replace( '/[^0-9]/', '', $val );
	switch ( $last ) {
		case 'g':
			$bytes *= 1024;
		case 'm':
			$bytes *= 1024;
		case 'k':
			$bytes *= 1024;
	}

	return $bytes;
}

/**
 * Ajax based on pulling contacts for the Chosen
 *
 * @since   3.2.5
 */
add_action( 'wp_ajax_wpcrm_get_email_recipients', 'wpcrm_get_email_recipients' );
function wpcrm_get_email_recipients() {

	$recipient = sanitize_text_field( $_REQUEST['recipient'] );

	$contacts = new WP_Query(
		array(
			'posts_per_page' => 10,
			'post_type'      => 'wpcrm-contact',
			'post_status'    => 'publish',
			's'              => $recipient,
			'meta_query'     => array(
				'key'   => '_wpcrm_contact-email',
				'value' => $recipient,
			),
		)
	);

	if ( $contacts->found_posts > 0 ) {
		$found = array();
		foreach ( $contacts->posts as $post ) {
			/**
			 * Gonna use get_post_meta on each loop
			 * WP_Query does not seems able to do this
			 *
			 * :/
			 */
			$found[] = array( get_post_meta( $post->ID, '_wpcrm_contact-email', true ), $post->post_title );
		}

		wp_send_json( $found );
	}

	wp_die();
}

/**
 * Ajax based submission from quick add modal
 *
 * @since   3.2.5
 */
add_action( 'wp_ajax_wcs_ajax_add_post', 'wcs_ajax_add_post' );
function wcs_ajax_add_post() {
	/**
	 * This will be our default response
	 *
	 * @since   3.2.5
	 */
	$response = array(
		'code'    => 400,
		'type'    => 'error',
		'message' => __( 'Something went wrong.. please try again!', 'wp-crm-system' ),
	);

	/**
	 * Avoid hijacking
	 *
	 * @since   3.2.5
	 */
	if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
		$response['message'] = __( 'Opps, nonce not matching.. please try again!', 'wp-crm-system' );
		wp_send_json( $response );
	}
	$params = array();
	parse_str( $_POST['formdata'], $params );

	/**
	 * 'wcs-post-type' is a must
	 *
	 * @since   3.2.5
	 */
	if ( ! isset( $params['wcs-post-type'] ) ) {
		$response['message'] = __( 'Invalid request.. please try again!', 'wp-crm-system' );
		wp_send_json( $response );
	}

	/**
	 * Post types - Prevent execution if not intended here
	 *
	 * @since   3.2.5
	 */
	$allowed = array(
		'organization',
		'contact',
		'project',
		'campaign',
		'task',
		'opportunity',
	);
	if ( ! in_array( $params['wcs-post-type'], $allowed ) ) {
		$response['message'] = __( 'Request not intended for WP CRM System.. please try again!', 'wp-crm-system' );
		wp_send_json( $response );
	}

	/**
	 * Use switch statement for detemining
	 * what post type we are going to add
	 *
	 * @since   3.2.5
	 */
	switch ( $params['wcs-post-type'] ) {
		case 'organization':
			/**
			 * Data sanitization needed
			 *
			 * @since   3.2.5
			 */
			$name        = isset( $params['name'] ) ? sanitize_text_field( $params['name'] ) : '';
			$phone       = isset( $params['phone'] ) ? sanitize_text_field( $params['phone'] ) : '';
			$email       = isset( $params['email'] ) ? sanitize_text_field( $params['email'] ) : '';
			$website     = isset( $params['website'] ) ? sanitize_text_field( $params['website'] ) : '';
			$address_one = isset( $params['address1'] ) ? sanitize_text_field( $params['address1'] ) : '';
			$address_two = isset( $params['address2'] ) ? sanitize_text_field( $params['address2'] ) : '';
			$city        = isset( $params['city'] ) ? sanitize_text_field( $params['city'] ) : '';
			$state       = isset( $params['state'] ) ? sanitize_text_field( $params['state'] ) : '';
			$postal      = isset( $params['postal'] ) ? sanitize_text_field( $params['postal'] ) : '';
			$country     = isset( $params['country'] ) ? sanitize_text_field( $params['country'] ) : '';

			/**
			 * Validations
			 *
			 * @since   3.2.5
			 */
			if ( empty( $name ) ) {
				$response['message'] = __( 'Organization name is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( empty( $email ) ) {
				$response['message'] = __( 'Organization email is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
				$response['message'] = __( 'Please provide valid email format! e.g. your-email@site.tld', 'wp-crm-system' );

				wp_send_json( $response );
			}

			/**
			 * Check if orgs email already exists to avoid duplicate
			 *
			 * @since   3.2.5
			 */
			$search = array(
				'post_type'  => 'wpcrm-organization',
				'meta_query' => array(
					array(
						'key'     => '_wpcrm_organization-email',
						'value'   => $email,
						'compare' => 'EXISTS',
					),
				),
			);
			$query  = new WP_Query( $search );
			if ( $query->found_posts > 0 ) {
				$response['message'] = __( 'Sorry, the email used for this organization already exists..', 'wp-crm-system' );

				wp_send_json( $response );
			}

			/**
			 * Prepare our arguments, then add new post
			 *
			 * @since   3.2.5
			 */
			$args    = array(
				'post_title'  => $name,
				'post_type'   => 'wpcrm-' . sanitize_text_field( $params['wcs-post-type'] ),
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
			);
			$post_id = wp_insert_post( $args );

			if ( ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_wpcrm_organization-phone', $phone );
				update_post_meta( $post_id, '_wpcrm_organization-email', $email );
				update_post_meta( $post_id, '_wpcrm_organization-website', $website );
				update_post_meta( $post_id, '_wpcrm_organization-address1', $address_one );
				update_post_meta( $post_id, '_wpcrm_organization-address2', $address_two );
				update_post_meta( $post_id, '_wpcrm_organization-city', $city );
				update_post_meta( $post_id, '_wpcrm_organization-state', $postal );
				update_post_meta( $post_id, '_wpcrm_organization-postal', $state );
				update_post_meta( $post_id, '_wpcrm_organization-country', $country );

				/**
				 * @NOTE: Since 3.2.5 does not incorporate Ajax based fetching
				 *
				 * We can pull records here and send it over to Ajax, as temporary solution
				 *
				 * @since   3.2.5
				 */
				$get_orgs     = get_posts(
					array(
						'numberposts' => 20,
						'post_type'   => 'wpcrm-organization',
						'orderby'     => 'ID',
						'sort_order'  => 'desc',
					)
				);
				$organisation = array();
				foreach ( $get_orgs as $org ) {
					$organisation[] = array(
						'ID'   => $org->ID,
						'name' => $org->post_title,
					);
				}

				$response = array(
					'code'          => 200,
					'type'          => 'success',
					'message'       => __( 'You have added new organization!', 'wp-crm-system' ),
					'id'            => $post_id,
					'organizations' => $organisation,
				);
			} else {
				$response['message'] = $post_id->get_error_message();
			}
			break;

		case 'contact':
				/**
				 * Data sanitization needed
				 *
				 * @since   3.2.5
				 */
				$prefix      = isset( $params['name_prefix'] ) ? sanitize_text_field( $params['name_prefix'] ) : '';
				$firstname   = isset( $params['first_name'] ) ? sanitize_text_field( $params['first_name'] ) : '';
				$lastname    = isset( $params['last_name'] ) ? sanitize_text_field( $params['last_name'] ) : '';
				$phone       = isset( $params['phone'] ) ? sanitize_text_field( $params['phone'] ) : '';
				$email       = isset( $params['email'] ) ? sanitize_text_field( $params['email'] ) : '';
				$website     = isset( $params['website'] ) ? sanitize_text_field( $params['website'] ) : '';
				$address_one = isset( $params['address1'] ) ? sanitize_text_field( $params['address1'] ) : '';
				$address_two = isset( $params['address2'] ) ? sanitize_text_field( $params['address2'] ) : '';
				$city        = isset( $params['city'] ) ? sanitize_text_field( $params['city'] ) : '';
				$state       = isset( $params['state'] ) ? sanitize_text_field( $params['state'] ) : '';
				$postal      = isset( $params['postal'] ) ? sanitize_text_field( $params['postal'] ) : '';
				$country     = isset( $params['country'] ) ? sanitize_text_field( $params['country'] ) : '';

				/**
				 * Validation
				 *
				 * @since   3.2.5
				 */
			if ( empty( $firstname ) ) {
				$response['message'] = __( 'First name is required!', 'wp-crm-system' );
				wp_send_json( $response );
			}
			if ( empty( $lastname ) ) {
				$response['message'] = __( 'Last name is required!', 'wp-crm-system' );
				wp_send_json( $response );
			}
			if ( empty( $email ) ) {
				$response['message'] = __( 'Contact email is required!', 'wp-crm-system' );
				wp_send_json( $response );
			}
			if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
				$response['message'] = __( 'Please provide valid email format! e.g. your-email@site.tld', 'wp-crm-system' );
				wp_send_json( $response );
			}

				$handle_duplicate = get_option( 'wpcrm_system_duplicate_contact' );
				/**
				 * Check if orgs email already exists to avoid duplicate
				 *
				 * @since   3.2.5
				 */
			if ( 'by_email' === $handle_duplicate ) {
				$search = array(
					'post_type'  => 'wpcrm-contact',
					'meta_query' => array(
						array(
							'key'     => '_wpcrm_contact-email',
							'value'   => $email,
							'compare' => 'EXISTS',
						),
					),
				);
				$query  = new WP_Query( $search );
				if ( $query->found_posts > 0 ) {
					$response['message'] = __( 'Sorry, the email used for this contact already exists..', 'wp-crm-system' );

					wp_send_json( $response );
				}
			} elseif ( 'by_name' === $handle_duplicate ) {

				/**
				 * get_page_by_title() being depreciated, we are going to use WP_Query instead
				 *
				 * Use 's' param to search post title and exerpt,
				 * the loop and check fo exact title match
				 */
				$args = array(
					's'         => $firstname . ' ' . $lastname,
					'post_type' => 'wpcrm-contact',
				);

				$is_exist    = false;
				$search_post = new WP_Query( $args );
				if ( ! empty( $search_post->posts ) ) {
					foreach ( $search_post->posts as $post ) {
						if ( $post->post_title === $firstname . ' ' . $lastname ) {
							$is_exist = true;
						}
					}
				}

				if ( $is_exist ) {
					$response['message'] = __( 'Sorry, this contact already exists..', 'wp-crm-system' );

					wp_send_json( $response );
				}
			}

				/**
				 * Prepare our arguments, then add new post
				 *
				 * @since   3.2.5
				 */
				$args    = array(
					'post_title'  => $firstname . ' ' . $lastname,
					'post_type'   => 'wpcrm-' . sanitize_text_field( $params['wcs-post-type'] ),
					'post_status' => 'publish',
					'post_author' => get_current_user_id(),
				);
				$post_id = wp_insert_post( $args );

				if ( ! is_wp_error( $post_id ) ) {
					update_post_meta( $post_id, '_wpcrm_contact-name-prefix', $prefix );
					update_post_meta( $post_id, '_wpcrm_contact-first-name', $firstname );
					update_post_meta( $post_id, '_wpcrm_contact-last-name', $lastname );
					update_post_meta( $post_id, '_wpcrm_contact-phone', $phone );
					update_post_meta( $post_id, '_wpcrm_contact-email', $email );
					update_post_meta( $post_id, '_wpcrm_contact-website', $website );
					update_post_meta( $post_id, '_wpcrm_contact-address1', $address_one );
					update_post_meta( $post_id, '_wpcrm_contact-address2', $address_two );
					update_post_meta( $post_id, '_wpcrm_contact-city', $city );
					update_post_meta( $post_id, '_wpcrm_contact-state', $postal );
					update_post_meta( $post_id, '_wpcrm_contact-postal', $state );
					update_post_meta( $post_id, '_wpcrm_contact-country', $country );

					/**
					 * @NOTE: Since 3.2.5 does not incorporate Ajax based fetching
					 *
					 * We can pull records here and send it over to Ajax, as temporary solution
					 *
					 * @since   3.2.5
					 */
					$get_contact = get_posts(
						array(
							'numberposts' => 20,
							'post_type'   => 'wpcrm-contact',
							'orderby'     => 'ID',
							'sort_order'  => 'desc',
						)
					);
					$contact     = array();
					foreach ( $get_contact as $org ) {
						$contact[] = array(
							'ID'   => $org->ID,
							'name' => $org->post_title,
						);
					}

					$response = array(
						'code'    => 200,
						'type'    => 'success',
						'message' => __( 'You have added new contact!', 'wp-crm-system' ),
						'id'      => $post_id,
						'contact' => $contact,
					);
				} else {
					$response['message'] = $post_id->get_error_message();
				}
			break;
		case 'project':
				/**
				 * Data sanitization needed
				 *
				 * @since   3.2.5
				 */
				$name        = isset( $params['name'] ) ? sanitize_text_field( $params['name'] ) : '';
				$value       = isset( $params['value'] ) ? sanitize_text_field( $params['value'] ) : '';
				$close_date  = isset( $params['close_date'] ) ? sanitize_text_field( $params['close_date'] ) : '';
				$status      = isset( $params['status'] ) ? sanitize_text_field( $params['status'] ) : '';
				$progress    = isset( $params['progress'] ) ? sanitize_text_field( $params['progress'] ) : '';
				$description = isset( $_POST['description'] ) ? wp_kses_post( $_POST['description'] ) : '';

				/**
				 * Validation
				 *
				 * @since   3.2.5
				 */
			if ( empty( $name ) ) {
				$response['message'] = __( 'Project name is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
				/**
				 * Check if project already exists to avoid duplicate
				 *
				 * @since   3.2.5
				 */
			if ( post_exists( $name, '', '', 'wpcrm-project' ) ) {
				$response['message'] = __( 'Sorry, this project already exists..', 'wp-crm-system' );

				wp_send_json( $response );
			}

				/**
				 * Project value is number, yes?
				 *
				 * @since   3.2.5
				 */
			if ( ! is_numeric( $value ) ) {
				$response['message'] = __( 'Project value must be number..', 'wp-crm-system' );

				wp_send_json( $response );
			}

				/**
				 * Prepare our arguments, then add new post
				 *
				 * @since   3.2.5
				 */
				$args    = array(
					'post_title'  => $name,
					'post_type'   => 'wpcrm-' . sanitize_text_field( $params['wcs-post-type'] ),
					'post_status' => 'publish',
					'post_author' => get_current_user_id(),
				);
				$post_id = wp_insert_post( $args );

				if ( ! is_wp_error( $post_id ) ) {
					update_post_meta( $post_id, '_wpcrm_project-value', $value );
					update_post_meta( $post_id, '_wpcrm_project-closedate', strtotime( $close_date ) );
					update_post_meta( $post_id, '_wpcrm_project-status', $status );
					update_post_meta( $post_id, '_wpcrm_project-progress', $progress );
					update_post_meta( $post_id, '_wpcrm_project-description', $description );

					/**
					 * @NOTE: Since 3.2.5 does not incorporate Ajax based fetching
					 *
					 * We can pull records here and send it over to Ajax, as temporary solution
					 *
					 * @since   3.2.5
					 */
					$get_project = get_posts(
						array(
							'numberposts' => 20,
							'post_type'   => 'wpcrm-project',
							'orderby'     => 'ID',
							'sort_order'  => 'desc',
						)
					);
					$project     = array();
					foreach ( $get_project as $org ) {
						$project[] = array(
							'ID'   => $org->ID,
							'name' => $org->post_title,
						);
					}

					$response = array(
						'code'    => 200,
						'type'    => 'success',
						'message' => __( 'You have added new project!', 'wp-crm-system' ),
						'id'      => $post_id,
						'project' => $project,
						'link'    => sprintf( '<li><span class="dashicons dashicons-clipboard wpcrm-dashicons"></span><a href="%s">%s</a></li>', get_edit_post_link( $post_id ), get_the_title( $post_id ) ),
						'day'     => date( 'j', strtotime( $close_date ) ),
					);
				} else {
					$response['message'] = $post_id->get_error_message();
				}
			break;
		case 'campaign':
			/**
			 * Data sanitization needed
			 *
			 * @since   3.2.5
			 */
			$name            = isset( $params['name'] ) ? sanitize_text_field( $params['name'] ) : '';
			$assign_to       = isset( $params['assign_to'] ) ? sanitize_text_field( $params['assign_to'] ) : '';
			$status          = isset( $params['status'] ) ? sanitize_text_field( $params['status'] ) : '';
			$start_date      = isset( $params['start_date'] ) ? sanitize_text_field( $params['start_date'] ) : '';
			$end_date        = isset( $params['end_date'] ) ? sanitize_text_field( $params['end_date'] ) : '';
			$projected_reach = isset( $params['projected_reach'] ) ? sanitize_text_field( $params['projected_reach'] ) : '';
			$total_responses = isset( $params['total_responses'] ) ? sanitize_text_field( $params['total_responses'] ) : '';
			$budgeted_cost   = isset( $params['budgeted_cost'] ) ? sanitize_text_field( $params['budgeted_cost'] ) : '';
			$actual_cost     = isset( $params['actual_cost'] ) ? sanitize_text_field( $params['actual_cost'] ) : '';
			$description     = isset( $_POST['description'] ) ? wp_kses_post( $_POST['description'] ) : '';

			/**
			 * Validation
			 *
			 * @since   3.2.5
			 */
			if ( empty( $name ) ) {
				$response['message'] = __( 'Campaign name is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
			/**
			 * Check if project already exists to avoid duplicate
			 *
			 * @since   3.2.5
			 */
			if ( post_exists( $name, '', '', 'wpcrm-project' ) ) {
				$response['message'] = __( 'Sorry, this campaign already exists..', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( empty( $budgeted_cost ) ) {
				$response['message'] = __( 'Budgeted cost is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( empty( $actual_cost ) ) {
				$response['message'] = __( 'Actual cost is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( ! is_numeric( $projected_reach ) ) {
				$response['message'] = __( 'Projected reach value must be number..', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( ! is_numeric( $total_responses ) ) {
				$response['message'] = __( 'Total response value must be number..', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( ! is_numeric( $budgeted_cost ) ) {
				$response['message'] = __( 'Budgeted cost value must be number..', 'wp-crm-system' );

				wp_send_json( $response );
			}
			if ( ! is_numeric( $actual_cost ) ) {
				$response['message'] = __( 'Actual cost value must be number..', 'wp-crm-system' );

				wp_send_json( $response );
			}

				/**
				 * Prepare our arguments, then add new post
				 *
				 * @since   3.2.5
				 */
				$args    = array(
					'post_title'  => $name,
					'post_type'   => 'wpcrm-' . sanitize_text_field( $params['wcs-post-type'] ),
					'post_status' => 'publish',
					'post_author' => get_current_user_id(),
				);
				$post_id = wp_insert_post( $args );

				if ( ! is_wp_error( $post_id ) ) {
					update_post_meta( $post_id, '_wpcrm_campaign-assigned', $assign_to );
					update_post_meta( $post_id, '_wpcrm_campaign-status', $status );
					update_post_meta( $post_id, '_wpcrm_campaign-startdate', strtotime( $start_date ) );
					update_post_meta( $post_id, '_wpcrm_campaign-enddate', strtotime( $end_date ) );
					update_post_meta( $post_id, '_wpcrm_campaign-projectedreach', $projected_reach );
					update_post_meta( $post_id, '_wpcrm_campaign-responses', $total_responses );
					update_post_meta( $post_id, '_wpcrm_campaign-budgetcost', $budgeted_cost );
					update_post_meta( $post_id, '_wpcrm_campaign-actualcost', $actual_cost );
					update_post_meta( $post_id, '_wpcrm_campaign-description', $description );
					update_post_meta( $post_id, '_wpcrm_campaign-active', 'yes' );

					/**
					 * @NOTE: Since 3.2.5 does not incorporate Ajax based fetching
					 *
					 * We can pull records here and send it over to Ajax, as temporary solution
					 *
					 * @since   3.2.5
					 */
					$get_campaign = get_posts(
						array(
							'numberposts' => 20,
							'post_type'   => 'wpcrm-campaign',
							'orderby'     => 'ID',
							'sort_order'  => 'desc',
						)
					);
					$campaign     = array();
					foreach ( $get_campaign as $org ) {
						$campaign[] = array(
							'ID'   => $org->ID,
							'name' => $org->post_title,
						);
					}

					$response = array(
						'code'      => 200,
						'type'      => 'success',
						'message'   => __( 'You have added new campaign!', 'wp-crm-system' ),
						'id'        => $post_id,
						'campaign'  => $campaign,
						'link'      => sprintf( '<li><span class="dashicons dashicons-megaphone wpcrm-dashicons"></span><a href="%s">%s</a></li>', get_edit_post_link( $post_id ), get_the_title( $post_id ) ),
						'start_day' => date( 'j', strtotime( $start_date ) ),
						'end_day'   => date( 'j', strtotime( $end_date ) ),
					);
				} else {
					$response['message'] = $post_id->get_error_message();
				}
			break;
		case 'task':
				/**
				 * Data sanitization needed
				 *
				 * @since   3.2.6
				 */
				$name        = isset( $params['name'] ) ? sanitize_text_field( $params['name'] ) : '';
				$assign_to   = isset( $params['task_assign_to'] ) ? sanitize_text_field( $params['task_assign_to'] ) : '';
				$status      = isset( $params['status'] ) ? sanitize_text_field( $params['status'] ) : '';
				$start_date  = isset( $params['task_start_date'] ) ? sanitize_text_field( $params['task_start_date'] ) : '';
				$due_date    = isset( $params['due_date'] ) ? sanitize_text_field( $params['due_date'] ) : '';
				$progress    = isset( $params['progress'] ) ? sanitize_text_field( $params['progress'] ) : '';
				$priority    = isset( $params['priority'] ) ? sanitize_text_field( $params['priority'] ) : '';
				$description = isset( $_POST['description'] ) ? wp_kses_post( $_POST['description'] ) : '';

				/**
				 * Validation
				 *
				 * @since   3.2.6
				 */
			if ( empty( $name ) ) {
				$response['message'] = __( 'Task name is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
				/**
				 * Check if task already exists to avoid duplicate
				 *
				 * @since   3.2.6
				 */
			if ( post_exists( $name, '', '', 'wpcrm-task' ) ) {
				$response['message'] = __( 'Sorry, this task already exists..', 'wp-crm-system' );

				wp_send_json( $response );
			}

					/**
					 * Prepare our arguments, then add new post
					 *
					 * @since   3.2.6
					 */
					$args    = array(
						'post_title'  => $name,
						'post_type'   => 'wpcrm-' . sanitize_text_field( $params['wcs-post-type'] ),
						'post_status' => 'publish',
						'post_author' => get_current_user_id(),
					);
					$post_id = wp_insert_post( $args );

					if ( ! is_wp_error( $post_id ) ) {
						update_post_meta( $post_id, '_wpcrm_task-assignment', $assign_to );
						update_post_meta( $post_id, '_wpcrm_task-status', $status );
						update_post_meta( $post_id, '_wpcrm_task-start-date', strtotime( $start_date ) );
						update_post_meta( $post_id, '_wpcrm_task-due-date', strtotime( $due_date ) );
						update_post_meta( $post_id, '_wpcrm_task-progress', $progress );
						update_post_meta( $post_id, '_wpcrm_task-priority', $priority );
						update_post_meta( $post_id, '_wpcrm_task-description', $description );

						/**
						 * @NOTE: Since 3.2.5 does not incorporate Ajax based fetching
						 *
						 * We can pull records here and send it over to Ajax, as temporary solution
						 *
						 * @since   3.2.6
						 */
						$get_campaign = get_posts(
							array(
								'numberposts' => 20,
								'post_type'   => 'wpcrm-task',
								'orderby'     => 'ID',
								'sort_order'  => 'desc',
							)
						);
						$task         = array();
						foreach ( $get_campaign as $org ) {
							$task[] = array(
								'ID'   => $org->ID,
								'name' => $org->post_title,
							);
						}

						$response = array(
							'code'      => 200,
							'type'      => 'success',
							'message'   => __( 'You have added new task!', 'wp-crm-system' ),
							'id'        => $post_id,
							'task'      => $task,
							'link'      => sprintf( '<li><span class="dashicons dashicons-yes wpcrm-dashicons"></span><a href="%s">%s</a></li>', get_edit_post_link( $post_id ), get_the_title( $post_id ) ),
							'start_day' => date( 'j', strtotime( $start_date ) ),
							'end_day'   => date( 'j', strtotime( $due_date ) ),
						);
					} else {
						$response['message'] = $post_id->get_error_message();
					}
			break;
		case 'opportunity':
			/**
			 * Data sanitization needed
			 *
			 * @since   3.2.6
			 */
			$name                  = isset( $params['name'] ) ? sanitize_text_field( $params['name'] ) : '';
			$assign_to             = isset( $params['assign_to'] ) ? sanitize_text_field( $params['assign_to'] ) : '';
			$forecasted_close_date = isset( $params['forecasted_close_date'] ) ? sanitize_text_field( $params['forecasted_close_date'] ) : '';
			$value                 = isset( $params['value'] ) ? sanitize_text_field( $params['value'] ) : '';
			$progress              = isset( $params['progress'] ) ? sanitize_text_field( $params['progress'] ) : '';
			$won_lost              = isset( $params['won_lost'] ) ? sanitize_text_field( $params['won_lost'] ) : '';
			$description           = isset( $_POST['description'] ) ? wp_kses_post( $_POST['description'] ) : '';

			/**
			 * Validation
			 *
			 * @since   3.2.6
			 */
			if ( empty( $name ) ) {
				$response['message'] = __( 'Opportunity name is required!', 'wp-crm-system' );

				wp_send_json( $response );
			}
			/**
			 * Check if opportunity already exists to avoid duplicate
			 *
			 * @since   3.2.6
			 */
			if ( post_exists( $name, '', '', 'wpcrm-opportunity' ) ) {
				$response['message'] = __( 'Sorry, this opportunity already exists..', 'wp-crm-system' );

				wp_send_json( $response );
			}

			/**
			 * Prepare our arguments, then add new post
			 *
			 * @since   3.2.6
			 */
			$args    = array(
				'post_title'  => $name,
				'post_type'   => 'wpcrm-' . sanitize_text_field( $params['wcs-post-type'] ),
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
			);
			$post_id = wp_insert_post( $args );

			if ( ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, '_wpcrm_opportunity-assigned', $assign_to );
				update_post_meta( $post_id, '_wpcrm_opportunity-value', $value );
				update_post_meta( $post_id, '_wpcrm_opportunity-closedate', strtotime( $forecasted_close_date ) );
				update_post_meta( $post_id, '_wpcrm_opportunity-wonlost', $won_lost );
				update_post_meta( $post_id, '_wpcrm_opportunity-probability', $progress );
				update_post_meta( $post_id, '_wpcrm_opportunity-description', $description );

				/**
				 * @NOTE: Since 3.2.5 does not incorporate Ajax based fetching
				 *
				 * We can pull records here and send it over to Ajax, as temporary solution
				 *
				 * @since   3.2.6
				 */
				$get_campaign = get_posts(
					array(
						'numberposts' => 20,
						'post_type'   => 'wpcrm-opportunity',
						'orderby'     => 'ID',
						'sort_order'  => 'desc',
					)
				);
				$opportunity  = array();
				foreach ( $get_campaign as $org ) {
					$opportunity[] = array(
						'ID'   => $org->ID,
						'name' => $org->post_title,
					);
				}

				$response = array(
					'code'        => 200,
					'type'        => 'success',
					'message'     => __( 'You have added new opportunity!', 'wp-crm-system' ),
					'id'          => $post_id,
					'opportunity' => $opportunity,
					'link'        => sprintf( '<li><span class="dashicons dashicons-phone wpcrm-dashicons"></span><a href="%s">%s</a></li>', get_edit_post_link( $post_id ), get_the_title( $post_id ) ),
					'day'         => date( 'j', strtotime( $forecasted_close_date ) ),
				);
			} else {
				$response['message'] = $post_id->get_error_message();
			}
			break;
	}

	wp_send_json( $response );
}

/**
 * Handles contact duplicate and how to proceed based on given value
 * If we have duplicate contact, force the status into draft
 *
 * @since 3.2.8
 */
add_action( 'save_post', 'wpcrm_save_contact', 10 );
function wpcrm_save_contact( $post_id ) {
	if ( 'wpcrm-contact' !== get_post_type( $post_id ) ) {
		return;
	}

	$handle_duplicate = get_option( 'wpcrm_system_duplicate_contact' );
	$first_name       = isset( $_POST['_wpcrm_contact-first-name'] ) ? sanitize_text_field( $_POST['_wpcrm_contact-first-name'] ) : '';
	$last_name        = isset( $_POST['_wpcrm_contact-last-name'] ) ? sanitize_text_field( $_POST['_wpcrm_contact-last-name'] ) : '';
	$email            = isset( $_POST['_wpcrm_contact-email'] ) ? sanitize_text_field( $_POST['_wpcrm_contact-email'] ) : '';

	/**
	 * If 'wpcrm_system_duplicate_contact' option is not yet saved,
	 * check duplicate by first and last name concatenation
	 *
	 * This is for backward compatibility
	 */
	if ( ! $handle_duplicate || 'by_name' === $handle_duplicate ) {

		/**
		 * get_page_by_title() being depreciated, we are going to use WP_Query instead
		 *
		 * Use 's' param to search post title and exerpt,
		 * the loop and check fo exact title match
		 */
		$args = array(
			's'         => $first_name . ' ' . $last_name,
			'post_type' => 'wpcrm-contact',
		);

		$is_exist    = false;
		$search_post = new WP_Query( $args );
		if ( ! empty( $search_post->posts ) ) {
			foreach ( $search_post->posts as $post ) {
				if ( $post->post_title === $first_name . ' ' . $last_name ) {
					$is_exist = true;
				}
			}
		}

		if ( $is_exist ) {
			add_filter( 'redirect_post_location', 'wpcrm_save_contact_redirect_error', 99 );

			// unhook this function to prevent indefinite loop
			remove_action( 'save_post', 'wpcrm_save_contact' );

			// update the post to change post status
			wp_update_post(
				array(
					'ID'          => $post_id,
					'post_status' => 'duplicate-contact',
				)
			);

			// re-hook this function again
			add_action( 'save_post', 'wpcrm_save_contact' );

		}
	} elseif ( 'by_email' === $handle_duplicate ) {
		$pages = get_posts(
			array(
				'post_type'  => 'wpcrm-contact',
				'meta_key'   => '_wpcrm_contact-email',
				'meta_value' => $email,
			)
		);

		if ( ! empty( $pages ) ) {
			if ( count( $pages ) > 1 ) {
				add_filter( 'redirect_post_location', 'wpcrm_save_contact_redirect_error', 99 );

				// unhook this function to prevent indefinite loop
				remove_action( 'save_post', 'wpcrm_save_contact' );

				// update the post to change post status
				wp_update_post(
					array(
						'ID'          => $post_id,
						'post_status' => 'duplicate-contact',
					)
				);

				// re-hook this function again
				add_action( 'save_post', 'wpcrm_save_contact' );
			}
		}
	}
}


/**
 * Saving post redirection
 *
 * Adds extra query for personalised
 * error messages on duplicate entry
 *
 * @since 3.2.8
 */
function wpcrm_save_contact_redirect_error( $location ) {
	remove_filter( 'redirect_post_location', 'wpcrm_save_contact_redirect_error', 99 );
	$handle_duplicate = get_option( 'wpcrm_system_duplicate_contact' );
	$args             = array(
		'contact_duplicate' => true,
		'first_name'        => sanitize_text_field( $_POST['_wpcrm_contact-first-name'] ),
		'last_name'         => sanitize_text_field( $_POST['_wpcrm_contact-last-name'] ),
	);
	if ( 'by_email' === $handle_duplicate ) {
		$args['email'] = sanitize_email( $_POST['_wpcrm_contact-email'] );
	}

	return add_query_arg(
		$args,
		$location
	);
}

/**
 * Display error message on duplicate contact
 *
 * @since 3.2.8
 */
add_action( 'admin_notices', 'wpcrm_save_contact_error_notice', 99 );
function wpcrm_save_contact_error_notice() {

	if ( isset( $_GET['contact_duplicate'] ) ) {
		printf( '<div class="error notice"><p><strong>%s</strong></p></div>', __( 'ERROR: This contact has duplicate. Status will be forced into draft.', 'wp-crm-system' ) );

		?>
		<style type="text/css">
			#message{
				display:none;
			}
		</style>
		<?php
	}

}

/**
 * Save new option for contact duplicate
 *
 * Values taken from Dashboard -> Settings -> Duplicate Contact
 */
add_action( 'admin_init', 'wpcrm_save_duplicate_contact_option' );
function wpcrm_save_duplicate_contact_option() {
	if ( isset( $_REQUEST['wpcrm_system_duplicate_contact'] ) ) {
		update_option( 'wpcrm_system_duplicate_contact', sanitize_text_field( $_REQUEST['wpcrm_system_duplicate_contact'] ) );
	}
}

/*
 * Replacement for get_page_by_title()
 *
 * WP core function is depreciated as of v6.2 and this will be the alternative
 */
function wcs_get_page_by_title( $page_title, $output = OBJECT, $post_type = 'page' ) {
	$query = new WP_Query(
		array(
			'post_type'              => $post_type,
			'title'                  => $page_title,
			'post_status'            => 'all',
			'posts_per_page'         => 1,
			'no_found_rows'          => true,
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
			'orderby'                => 'post_date ID',
			'order'                  => 'ASC',
		)
	);

	if ( ! empty( $query->post ) ) {
		$page_got_by_title = $query->post;
	} else {
		$page_got_by_title = null;
	}

	return $page_got_by_title;
}
