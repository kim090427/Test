## Installation

Clone the repository and run the command below to install node dependencies.  

```sh
npm install
```

After that, configure the project to use with XAMPP or Docker.

## Docker

Make sure that you have Docker and Docker Compose installed in your machine and then run:

```sh
docker-compose up
```

After that, check the project up and running: http://localhost:8080

If you want to change Docker port, go to the "src/util" folder and modify the constants.js file.

| Command          | Description                                       |
|------------------|---------------------------------------------------|
| `npm run dev`   | Start development mode and watch for file changes |
| `npm run build` | Generates the minified file ready for production  |

## Requirements

The project have been tested using the versions below:

- XAMPP Stack / Docker with PHP version 7.4.7
- Node version 12.18.3
- NPM version 6.14.6

## Improved SQL Query
```sh
SELECT Jobs.id AS `Jobs__id`,
	Jobs.name AS `Jobs__name`,
	Jobs.media_id AS `Jobs__media_id`,
	Jobs.job_category_id AS `Jobs__job_category_id`,
	Jobs.job_type_id AS `Jobs__job_type_id`,
	Jobs.description AS `Jobs__description`,
	Jobs.detail AS `Jobs__detail`,
	Jobs.business_skill AS `Jobs__business_skill`,
	Jobs.knowledge AS `Jobs__knowledge`,
	Jobs.location AS `Jobs__location`,
	Jobs.activity AS `Jobs__activity`,
	Jobs.academic_degree_doctor AS `Jobs__academic_degree_doctor`,
	Jobs.academic_degree_master AS `Jobs__academic_degree_master`,
	Jobs.academic_degree_professional AS `Jobs__academic_degree_professional`,
	Jobs.academic_degree_bachelor AS `Jobs__academic_degree_bachelor`,
	Jobs.salary_statistic_group AS `Jobs__salary_statistic_group`,
	Jobs.salary_range_first_year AS `Jobs__salary_range_first_year`,
	Jobs.salary_range_average AS `Jobs__salary_range_average`,
	Jobs.salary_range_remarks AS `Jobs__salary_range_remarks`,
	Jobs.restriction AS `Jobs__restriction`,
	Jobs.estimated_total_workers AS `Jobs__estimated_total_workers`,
	Jobs.remarks AS `Jobs__remarks`,
	Jobs.url AS `Jobs__url`,
	Jobs.seo_description AS `Jobs__seo_description`,
	Jobs.seo_keywords AS `Jobs__seo_keywords`,
	Jobs.sort_order AS `Jobs__sort_order`,
	Jobs.publish_status AS `Jobs__publish_status`,
	Jobs.version AS `Jobs__version`,
	Jobs.created_by AS `Jobs__created_by`,
	Jobs.created AS `Jobs__created`,
	Jobs.modified AS `Jobs__modified`,
	Jobs.deleted AS `Jobs__deleted`,
	JobCategories.id AS `JobCategories__id`,
	JobCategories.name AS `JobCategories__name`,
	JobCategories.sort_order AS `JobCategories__sort_order`,
	JobCategories.created_by AS `JobCategories__created_by`,
	JobCategories.created AS `JobCategories__created`,
	JobCategories.modified AS `JobCategories__modified`,
	JobCategories.deleted AS `JobCategories__deleted`,
	JobTypes.id AS `JobTypes__id`,
	JobTypes.name AS `JobTypes__name`,
	JobTypes.job_category_id AS `JobTypes__job_category_id`,
	JobTypes.sort_order AS `JobTypes__sort_order`,
	JobTypes.created_by AS `JobTypes__created_by`,
	JobTypes.created AS `JobTypes__created`,
	JobTypes.modified AS `JobTypes__modified`,
	JobTypes.deleted AS `JobTypes__deleted`
FROM jobs Jobs
LEFT JOIN jobs_personalities JobsPersonalities ON Jobs.id = (JobsPersonalities.job_id)
LEFT JOIN personalities Personalities ON Personalities.id = (JobsPersonalities.personality_id)
LEFT JOIN jobs_practical_skills JobsPracticalSkills ON Jobs.id = (JobsPracticalSkills.job_id)
LEFT JOIN practical_skills PracticalSkills ON PracticalSkills.id = (JobsPracticalSkills.practical_skill_id)
LEFT JOIN jobs_basic_abilities JobsBasicAbilities ON Jobs.id = (JobsBasicAbilities.job_id) 
LEFT JOIN basic_abilities BasicAbilities ON BasicAbilities.id = (JobsBasicAbilities.basic_ability_id)
LEFT JOIN jobs_tools JobsTools ON Jobs.id = (JobsTools.job_id)
LEFT JOIN affiliates Tools ON Tools.id = (JobsTools.affiliate_id)
LEFT JOIN jobs_career_paths JobsCareerPaths ON Jobs.id = (JobsCareerPaths.job_id)
LEFT JOIN affiliates CareerPaths CareerPaths.id = (JobsCareerPaths.affiliate_id)
LEFT JOIN jobs_rec_qualifications JobsRecQualifications ON Jobs.id = (JobsRecQualifications.job_id)
LEFT JOIN affiliates RecQualifications ON RecQualifications.id = (JobsRecQualifications.affiliate_id)
LEFT JOIN jobs_req_qualifications JobsReqQualifications ON Jobs.id = (JobsReqQualifications.job_id)
LEFT JOIN affiliates ReqQualifications ON ReqQualifications.id = (JobsReqQualifications.affiliate_id)
INNER JOIN job_categories JobCategories ON JobCategories.id = (Jobs.job_category_id)
INNER JOIN job_types JobTypes ON JobTypes.id = (Jobs.job_type_id)
WHERE 
	((JobCategories.name LIKE '%キャビンアテンダント%'
	OR JobTypes.name LIKE '%キャビンアテンダント%'
	OR Jobs.name LIKE '%キャビンアテンダント%'
	OR Jobs.description LIKE '%キャビンアテンダント%'
	OR Jobs.detail LIKE '%キャビンアテンダント%'
	OR Jobs.business_skill LIKE '%キャビンアテンダント%'
	OR Jobs.knowledge LIKE '%キャビンアテンダント%'
	OR Jobs.location LIKE '%キャビンアテンダント%'
	OR Jobs.activity LIKE '%キャビンアテンダント%'
	OR Jobs.salary_statistic_group LIKE '%キャビンアテンダント%'
	OR Jobs.salary_range_remarks LIKE '%キャビンアテンダント%'
	OR Jobs.restriction LIKE '%キャビンアテンダント%'
	OR Jobs.remarks LIKE '%キャビンアテンダント%'
	OR Personalities.name LIKE '%キャビンアテンダント%'
	OR PracticalSkills.name LIKE '%キャビンアテンダント%'
	OR BasicAbilities.name LIKE '%キャビンアテンダント%'
	OR Tools.name LIKE '%キャビンアテンダント%'
	OR CareerPaths.name LIKE '%キャビンアテンダント%'
	OR RecQualifications.name LIKE '%キャビンアテンダント%'
	OR ReqQualifications.name LIKE '%キャビンアテンダント%')
	
	AND Personalities.deleted IS NULL
	AND PracticalSkills.deleted IS NULL
	AND BasicAbilities.deleted IS NULL
	AND Tools.deleted IS NULL
	AND Jobs.deleted IS NULL
	AND CareerPaths.deleted) IS NULL
	AND ReCQualifications.deleted IS NULL
	AND ReqQualifications.deleted IS NULL
	AND JobCategories.deleted IS NULL
	AND JobTypes.deleted IS NULL
	
	AND Tools.type = 1
	AND publish_status = 1	
	AND CareerPaths.type = 3	
	AND ReCQualifications.type = 2
	AND ReqQualifications.type = 2	
	
GROUP BY Jobs.id
ORDER BY Jobs.sort_order desc,
Jobs.id DESC LIMIT 50 OFFSET 0
```

