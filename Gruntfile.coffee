module.exports = (grunt) ->
  @initConfig
    pkg: @file.readJSON('package.json')
    watch:
      files: [
        'css/src/*.scss'
      ]
      tasks: ['develop']
    compass:
      dist:
        options:
          config: 'config.rb'
          force: true
      dev:
        options:
          config: 'config.rb'
          force: true
          outputStyle: 'expanded'
          sourcemap: true
          noLineComments: true
    compress:
      main:
        options:
          archive: grunt.file.readJSON('package.json').name + '.zip'
        files: [
          {src: ['css/*.css']},
          {src: ['img/**']},
          {src: ['includes/*.php']},
          {src: ['agrilife-genesis-links.php']},
          {src: ['README.md']},
        ]
    gitinfo:
      commands:
        'lastUpdate': ['log', '-1', '--pretty=format:"%s"', '--no-merges']
    gh_release:
      options:
        token: process.env.RELEASE_KEY
        owner: 'agrilife'
        repo: grunt.file.readJSON('package.json').name
      release:
        tag_name: grunt.file.readJSON('package.json').version
        target_commitish: 'master'
        name: 'Release'
        body: '<%= gitinfo.lastUpdate %>'
        draft: false
        prerelease: false
        asset:
          name: grunt.file.readJSON('package.json').name + '.zip'
          file: grunt.file.readJSON('package.json').name + '.zip'
          'Content-Type': 'application/zip'

  @loadNpmTasks 'grunt-contrib-compass'
  @loadNpmTasks 'grunt-contrib-watch'
  @loadNpmTasks 'grunt-contrib-compress'
  @loadNpmTasks 'grunt-gh-release'
  @loadNpmTasks 'grunt-gitinfo'

  @registerTask 'develop', ['compass:dev']
  @registerTask 'package', ['compass:dist']
  @registerTask 'release', ['gitinfo', 'compress', 'gh_release']

  @event.on 'watch', (action, filepath) =>
    @log.writeln('#{filepath} has #{action}')