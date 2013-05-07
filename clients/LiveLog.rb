=begin
LiveLog.rb
This is the ruby client of LiveLog. 

Require this class to your code and use the public methods of postToServer to send information to the live log front end

Usage is like so:
logger = LiveLog::Logger.new('session ID from live log')
logger.postToServer("Debug Messages make me jump for joy!")

=end

require 'net/http'
require "uri"

begin
	require 'rubygems'
	require 'json'
rescue LoadError
	abort "Could not load JSON gem, please run gem install JSON"
end

module LiveLog
	def self.confRead(path="config/config.php")
		#Provide an alternate path if neccesary
		if File.exists?(path)
			conf = File.new(path,'r')
		else
			abort "Could not open configuration file"
		end
		contents = conf.read
		return contents.scan(/^define\("BASEDIR", \"(.*)"\);/i).flatten[0]

	end

	class Logger
		@host
		@page
		@sessionID 
		def initialize(sessionId="")
			#Get the configuration Details
			@host = LiveLog.confRead
			@page = 'front_end/LiveLogCatch.php'
			if @host == nil
				abort "Configuration file invalid"
			end
			@sessionID = sessionId
		end

		def postToServer(var)
			#Send the var to the server for viewing
			#Catch the next to last calling party, but if we're at root level then just grab that
			callingFunc = caller[1] == nil ? caller[0] : caller[1]
			callingLine =  callingFunc.scan(/:([0-9]*)/).flatten[0]
			fname = __FILE__.scan(/([^\/]+$)/).flatten[0]

			#need http:// here so request_uri works
			if(!@host.match(/http:\/\//))
				@host = 'http://' + @host
			end

			#Create the uri
			uri = URI.parse(@host + @page)
			http = Net::HTTP.new(uri.host,uri.port)
		
			request = Net::HTTP::Post.new(uri.request_uri)
			request.set_form_data({"sessionID" =>@sessionID,"data"=>JSON.dump({"filename"=>fname, "logData"=>var,"lineNumber"=>callingLine})})

			response = http.request(request)

			puts response
			if response.code.to_s != '200'
				#I'm not OKAY!!!! -MCR
				warn "Response from LiveLog Server was " + response.code.to_s
			end

		end
	end

end

if __FILE__==$0
	#If we're testing the module:
	l = LiveLog::Logger.new('6dk4mt6jptl0m9rujtds59gaf5')
	l.postToServer("{'Ruby' : 'info'}")

end