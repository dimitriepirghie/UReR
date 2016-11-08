from flask import Flask, request, abort

app = Flask(__name__)


class Dispatcher(object):
    __service_identifier_proxy_mapping__ = {}

    def __init__(self):
        """
        Get all proxies
        """
        import Proxies
        self.__service_identifier_proxy_mapping__['facebook_identifier'] = Proxies.FacebookProxy()
        self.__service_identifier_proxy_mapping__['linkedin_identifier'] = Proxies.LinkedInProxy()
        self.__service_identifier_proxy_mapping__['foaf_identifier'] = Proxies.FOAFProxy()

    def __get_proxy__(self, service_identifier):
        """
        For a service_identifier return specific proxy
        :param service_identifier: service_identifier
        :return: AbstractProxy specific object
        """
        return self.__service_identifier_proxy_mapping__[service_identifier]\
            if service_identifier in self.__service_identifier_proxy_mapping__ else None

    def dispatch(self, service_identifier, request=None):
        specific_proxy = self.__get_proxy__(service_identifier)
        if specific_proxy:
            return specific_proxy.serve_request(request)
        else:
            abort(400)


def authenticate_and_authorize():
    """
    Check if request if a request is valid
    :return: boolean
    """
    # TODO: Implement request validation method !
    return True if request else False


@app.route('/service/<service_identifier>')
def service(service_identifier):
    if not authenticate_and_authorize():
        abort(401, "Unauthorized")

    dispatcher = Dispatcher()
    return dispatcher.dispatch(service_identifier, request)


@app.route('/')
def hello_client():
    return 'Hello Client, here is how UReR API Works ! ' # Redirect


if __name__ == '__main__':
    app.run()
