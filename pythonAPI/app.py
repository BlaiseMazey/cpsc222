from flask import Flask, jsonify, request

app = Flask(__name__)
def passwordAndUserCheck():
	username = request.form.get("username")
	password = request.form.get("password")
	return username == "test" and password == "abcABC123"

@app.route('/')
def hello_world():
	return jsonify(message="Hello, World, add /users to the ip to see the users on the device ")


#makes a list var of users, opens the path that contains the users, then parses through the lines. it splits it on colons. it takes the slpit lines and loads them into users. when its done it closes the file and reurns the list. you can choose the raw data option in the web browser to see the right thing 
def get_users():
	users = {}
	file = open("/etc/passwd","r")
	for line in file:
		parts = line.split(":")
		username = parts[0]
		user_id = parts[2]
		users[user_id] = username
	file.close()
	return users


#not tested yet but the first part of the line should be the group name
def get_groups():
	groups = {}
	file = open("/etc/group", "r")
	for line in file:
		parts = line.split(":")
		groupName = parts[0]
		groupID = parts[2]
		groups[groupID] = groupName
	file.close()
	return groups

# was temporrary good test to see if method works groupTest = get_groups()

#should print users if you type /users next to the IP in browser
@app.route('/api/users', methods=["POST"]) #should have methods = ["POST"]
def print_users():
	if not passwordAndUserCheck:
                return jsonify({"error": "Unauthorized"}), 401
	return jsonify(get_users())

@app.route('/api/groups', methods=["POST"])
def print_groups():
	if not passwordAndUserCheck:
		return jsonify({"error": "Unauthorized"}), 401
	return jsonify(get_groups())

#stored data, may not be usefull but was in tut
items = [{"id":  1, "name": "This is Item one" }, {"id": 2, "name": "This is Item two"} ]

if __name__ == "__main__":
	app.run(host="0.0.0.0", port=3000)
