from flask import Flask, request
from Recommenders import *

app = Flask(__name__)


def find_event_by_identifier(identifier=None):
    return True


def fetch_event_from_post():
    return True


def resources_to_api_response(resorces_list = []):
    """
    From list of resources object return API Response <XML> / JSON etc.
    :param resorces_list:
    :return: api response
    """
    return True


class RecommenderFacade(object):
    def __init__(self):
        self.recommenders = []
        self.recommenders.append(FOAFRecommender())
        self.recommenders.append(POIsRecommender())
        self.recommenders.append(EventsRecommender())

        pass

    def recommend_by_keywords(self, given_keywords = []):
        recommended_resources = []
        for recommender in self.recommenders:
            recommended_resources.append(recommender.recommend_by_keywords(given_keywords))
        return recommended_resources

    def recommend_by_event(self, event):
        recommended_resources = []
        for recommender in self.recommenders:
            recommended_resources.append(recommender.recommend_by_event(event))
        return recommended_resources


@app.route('/recommender_resources_by_event/<event_identifier>', methods=['POST, GET'])
def event_recommender(event_identifier=None):
    if request.method == 'GET':
        event = find_event_by_identifier(event_identifier)
    else:
        event = fetch_event_from_post()

    recommender = RecommenderFacade()
    return resources_to_api_response(recommender.recommend_by_event(event))

@app.route('/recommender_resources_by_keywords/<key_words>', methods=['GET'])
def event_recommender(key_words=None):

    recommender = RecommenderFacade()
    return resources_to_api_response(recommender.recommend_by_keywords(key_words))


if __name__ == '__main__':
    app.run()
