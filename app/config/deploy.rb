set :application, "Actual Skill"
set :domain,      "nogetmedkode.dk"
set :deploy_to,   "/srv/www/prod.actualskill.com"

set :user,        "root"
set :use_sudo,    false
ssh_options[:port] = 22

set :repository,  "/Users/troels.johnsen/Web/actualskill.dev"
set :scm,         :git
set :branch,      "master"
set :deploy_via,  :rsync_with_remote_cache

# directories that will be shared between all deployments
set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]

# share our database configuration
set :shared_files,      ["app/config/parameters.ini"]

set :update_vendors, false

role :app, 'nogetmedkode.dk'
role :web, 'nogetmedkode.dk'
