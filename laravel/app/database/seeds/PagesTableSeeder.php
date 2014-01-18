<?php 

use App\Models\Page;

class PagesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('pages')->delete();
        
        Page::create(array(
				'title'   => 'About us',
				'slug'    => 'about-us',
				'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'user_id' => 1,
				'created_at' => Carbon\Carbon::now()->subWeek(),
				'updated_at' => Carbon\Carbon::now()->subWeek(),				
		));
        Page::create(array(
				'title'   => 'Terms of Service',
				'slug'    => 'terms-of-service',
				'body'    => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
				'user_id' => 1,
				'created_at' => Carbon\Carbon::now()->subDay(),
				'updated_at' => Carbon\Carbon::now()->subDay(),
		));
		Page::create(array(
				'title'   => 'Contact',
				'slug'    => 'contact',
				'body'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'user_id' => 1,
				'created_at' => Carbon\Carbon::now()->subDay(),
				'updated_at' => Carbon\Carbon::now()->subDay(),
		));
		Page::create(array(
				'title'   => 'Hour Exchange - Hr : X',
				'slug'    => 'welcome',
				'body'    => '
<p>The more you give, the richer you are.</p>
<p>Trade your work, your skills and capacities.</p>
 
<h3>Why is Hour Exchange better than volunteering?</h3>
<p>We are strong supporters of volunteering and we have created this platform to match the needs of people.</p>
<p>We believe that Hr:X community offers large advantages over traditional volunteering. You can join because you need help getting a job done and in the same time you know your experience can help someone else.</p>
<p>When you complete a traditional volunteering position you receive a letter of reference that you can attach to your resume. You get the chance to show your work resume and your vast volunteering experience to a possible employer only after you get selected for an interview.  With Hr:X after you complete a job you receive an online review that attaches to your on-line profile. Your profile can be accessed anytime by any of our business members.</p>
 
<h3>What do our members have in common?</h3>
<p>All our members offer and request work proposals. We are not a classified adds page where corporations and NGOs are posting jobs and volunteering positions while prospects have to request an interview to be selected for the job. We are a work exchange platform where everybody has to solicit and offer work tasks. The more tasks are posted the richer the community is and every matched and accomplished task brings experience and trust.</p>
<p>Every member has direct access to all the community resources, our work task database. Every member’s community wealth is in direct proportion with the community’s total capacity. The richer the community is, the richer you are. Because you don’t need everything all the time and you can offer only some things sometime, our online community page exists to match the needs of what you have to offer and what you want to receive with those of all the others members of our community.</p>
 
<h3>How many members?</h3>
<p>The more members the better. We have two types of memberships. Business and Individual. The difference is the HourX transaction capacity. An Individual Member can post a task offer and transaction only one other Member (Individual or Business) to do the task while a Business Member can post a task offer and transaction multiple other members for multiple positions.</p>
<p>View-Only Memberships are Free. These members can create a profile, view and reply to postings. They can receive reviews for completed work.</p>
				',
				'user_id' => 1,
		));
		Page::create(array(
				'title'   => 'HTML Editor',
				'slug'    => 'html-editor',
				'body'    => '
				<p><img src="https://ucarecdn.com/87390d01-4fd8-4ea6-a016-07fd8c096547/" /></p>

<p>Lorem ipsum dolor sit amet, <a href="http://hx.kodewebsites.com">consectetur adipisicing elit</a>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<p><img src="https://ucarecdn.com/ff9995a8-416f-4ee3-915e-2a82bbe0d22b/" /></p>

<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <strong>Excepteur sint</strong> occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				',
				'user_id' => 1,
		));
		
		
		

	}

}
