
def create_virtual_env(project_name):
    """Tạo môi trường ảo và cài đặt các thư viện cơ bản."""
    print("Tạo môi trường ảo...")
    run_command(f"python -m venv {project_name}/venv")
    print("Môi trường ảo đã được tạo.")

    # Kích hoạt môi trường ảo và cài đặt Flask
    activate_venv = (
        f"{project_name}\\venv\\Scripts\\activate" if os.name == "nt"
        else f"source {project_name}/venv/bin/activate"
    )
    run_command(f"{activate_venv} && pip install --upgrade pip && pip install flask")

    # Ghi lại các thư viện vào requirements.txt
    print("Lưu danh sách thư viện vào requirements.txt...")
    run_command(f"{activate_venv} && pip freeze > {project_name}/requirements.txt")

def setup_git(project_name, repo_url):
    """Khởi tạo Git, tạo .gitignore và đẩy code lên GitHub."""
    os.chdir(project_name)
    print("Khởi tạo Git repository...")
    run_command("git init")

    # Tạo file .gitignore
    print("Tạo file .gitignore...")
    with open(".gitignore", "w") as f:
        f.write("venv/\n__pycache__/\n*.pyc\n*.pyo\n*.pyd\n")
